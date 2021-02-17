<?php

namespace Marketplaceful;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Laravel\Fortify\Fortify;
use Livewire\Livewire;
use Marketplaceful\Console\InstallCommand;
use Marketplaceful\Console\MakeUser;
use Marketplaceful\Http\Livewire\Portal\Conversations\ConversationList;
use Marketplaceful\Http\Livewire\Portal\Conversations\CreateConversationForm;
use Marketplaceful\Http\Livewire\Portal\Conversations\Message;
use Marketplaceful\Http\Livewire\Portal\Conversations\MessageList;
use Marketplaceful\Http\Livewire\Portal\Conversations\MessageOwn;
use Marketplaceful\Http\Livewire\Portal\Conversations\ReplyConversationForm;
use Marketplaceful\Http\Livewire\Portal\Conversations\ShowConversation;
use Marketplaceful\Http\Livewire\Portal\Conversations\ShowConversations;
use Marketplaceful\Http\Livewire\Portal\Listings\ContactForm;
use Marketplaceful\Http\Livewire\Portal\Listings\CreateListing;
use Marketplaceful\Http\Livewire\Portal\Listings\CreateListingForm;
use Marketplaceful\Http\Livewire\Portal\Listings\ShowContact;
use Marketplaceful\Http\Livewire\Portal\Listings\ShowListing;
use Marketplaceful\Http\Livewire\Portal\Listings\ShowListings;
use Marketplaceful\Http\Livewire\Portal\Listings\UpdateListingForm;
use Marketplaceful\Http\Livewire\Portal\Profile\ShowProfile;
use Marketplaceful\Http\Livewire\Portal\Profile\UpdatePasswordForm;
use Marketplaceful\Http\Livewire\Portal\Profile\UpdateProfileInformationForm;
use Marketplaceful\Http\Livewire\Portal\Welcome;
use Marketplaceful\Http\Livewire\Tags\CreateTag;
use Marketplaceful\Http\Livewire\Tags\CreateTagForm;
use Marketplaceful\Http\Livewire\Tags\DeleteTagForm;
use Marketplaceful\Http\Livewire\Tags\ShowTag;
use Marketplaceful\Http\Livewire\Tags\ShowTags;
use Marketplaceful\Http\Livewire\Tags\UpdateTagForm;
use Marketplaceful\Models\Listing;
use Marketplaceful\Models\Order;
use Marketplaceful\Policies\ListingPolicy;
use Marketplaceful\Policies\OrderPolicy;
use Marketplaceful\Policies\UserPolicy;

class MarketplacefulServiceProvider extends ServiceProvider
{
    protected $policies = [
        Listing::class => ListingPolicy::class,
        Order::class => OrderPolicy::class,
    ];

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/marketplaceful.php', 'marketplaceful');

        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('marketplaceful::listings.show-listings', \Marketplaceful\Http\Livewire\Listings\ShowListings::class);
            Livewire::component('marketplaceful::listings.show-listing', \Marketplaceful\Http\Livewire\Listings\ShowListing::class);
            Livewire::component('marketplaceful::listings.update-listing-form', \Marketplaceful\Http\Livewire\Listings\UpdateListingForm::class);
            Livewire::component('marketplaceful::listings.update-listing-settings-form', \Marketplaceful\Http\Livewire\Listings\UpdateListingSettingsForm::class);
            Livewire::component('marketplaceful::listings.update-listing-metadata-form', \Marketplaceful\Http\Livewire\Listings\UpdateListingMetadataForm::class);
            Livewire::component('marketplaceful::listings.publish-listing-form', \Marketplaceful\Http\Livewire\Listings\PublishListingForm::class);
            Livewire::component('marketplaceful::listings.un-publish-listing-form', \Marketplaceful\Http\Livewire\Listings\UnPublishListingForm::class);
            Livewire::component('marketplaceful::listings.delete-listing-form', \Marketplaceful\Http\Livewire\Listings\DeleteListingForm::class);
            Livewire::component('marketplaceful::listings.reject-listing-form', \Marketplaceful\Http\Livewire\Listings\RejectListingForm::class);

            Livewire::component('marketplaceful::tags.show-tags', ShowTags::class);
            Livewire::component('marketplaceful::tags.create-tag', CreateTag::class);
            Livewire::component('marketplaceful::tags.create-tag-form', CreateTagForm::class);
            Livewire::component('marketplaceful::tags.show-tag', ShowTag::class);
            Livewire::component('marketplaceful::tags.update-tag-form', UpdateTagForm::class);
            Livewire::component('marketplaceful::tags.delete-tag-form', DeleteTagForm::class);

            Livewire::component('marketplaceful::portal.welcome', Welcome::class);
            Livewire::component('marketplaceful::portal.profile', ShowProfile::class);
            Livewire::component('marketplaceful::portal.update-profile-information-form', UpdateProfileInformationForm::class);
            Livewire::component('marketplaceful::portal.update-password-form', UpdatePasswordForm::class);

            Livewire::component('marketplaceful::portal.listings.show-listings', ShowListings::class);
            Livewire::component('marketplaceful::portal.listings.create-listing', CreateListing::class);
            Livewire::component('marketplaceful::portal.listings.create-listing-form', CreateListingForm::class);
            Livewire::component('marketplaceful::portal.listings.show-listing', ShowListing::class);
            Livewire::component('marketplaceful::portal.listings.update-listing-form', UpdateListingForm::class);
            Livewire::component('marketplaceful::portal.listings.show-contact', ShowContact::class);
            Livewire::component('marketplaceful::portal.listings.contact-form', ContactForm::class);

            Livewire::component('marketplaceful::portal.conversations.show-conversations', ShowConversations::class);
            Livewire::component('marketplaceful::portal.conversations.show-conversation', ShowConversation::class);
            Livewire::component('marketplaceful::portal.conversations.conversation-list', ConversationList::class);
            Livewire::component('marketplaceful::portal.conversations.create-conversation-form', CreateConversationForm::class);
            Livewire::component('marketplaceful::portal.conversations.message', Message::class);
            Livewire::component('marketplaceful::portal.conversations.message-list', MessageList::class);
            Livewire::component('marketplaceful::portal.conversations.message-own', MessageOwn::class);
            Livewire::component('marketplaceful::portal.conversations.reply-conversation-form', ReplyConversationForm::class);
        });
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'marketplaceful');

        if (Features::enabled(Features::authentication())) {
            Fortify::viewPrefix('marketplaceful::auth.');
        }

        $this->configureComponents();
        $this->configurePublishing();
        $this->configureRoutes();
        $this->configureCommands();
        $this->configureGates();

        Gate::policy(Marketplaceful::userModel(), UserPolicy::class);
    }

    protected function configureComponents()
    {
        $this->callAfterResolving(BladeCompiler::class, function () {
            $this->registerComponent('card.auth');
            $this->registerComponent('card.auth-logo');

            $this->registerComponent('label');

            $this->registerComponent('input');
            $this->registerComponent('input.error');
            $this->registerComponent('input.checkbox');
            $this->registerComponent('input.filepond');
            $this->registerComponent('input.textarea');
            $this->registerComponent('input.price');

            $this->registerComponent('validation-errors');

            $this->registerComponent('badge.status');

            $this->registerComponent('form.action-message');
            $this->registerComponent('form.dashboard-section');
            $this->registerComponent('form.portal-section');
            $this->registerComponent('form.portal-section-simple');
            $this->registerComponent('form.portal-section-title');
            $this->registerComponent('form.dashboard-section-title');
            $this->registerComponent('form.section-border');

            $this->registerComponent('button');
            $this->registerComponent('button.secondary');
            $this->registerComponent('button.danger');

            $this->registerComponent('header.portal');

            $this->registerComponent('page-heading');

            $this->registerComponent('back-link');

            $this->registerComponent('dropdown');
            $this->registerComponent('dropdown.link');

            $this->registerComponent('navigation.dashboard-link');
            $this->registerComponent('navigation.portal-link');
            $this->registerComponent('navigation.responsive-dashboard-link');
            $this->registerComponent('navigation.responsive-portal-link');

            $this->registerComponent('table');
            $this->registerComponent('table.cell');
            $this->registerComponent('table.heading');
            $this->registerComponent('table.row');

            $this->registerComponent('navbar');
            $this->registerComponent('application-mark');
            $this->registerComponent('action-section');

            $this->registerComponent('modal');
            $this->registerComponent('modal.confirmation');

            $this->registerComponent('tab');
            $this->registerComponent('tab.link');

            $this->registerComponent('portal');
            $this->registerComponent('navbar.portal');

            Blade::component(\Marketplaceful\View\Components\Layouts\Html::class, 'mkt-layouts.html');
            Blade::component(\Marketplaceful\View\Components\Layouts\Guest::class, 'mkt-layouts.guest');
            Blade::component(\Marketplaceful\View\Components\Layouts\Guest::class, 'mkt-layouts.portal');
            Blade::component(\Marketplaceful\View\Components\Layouts\Base::class, 'mkt-layouts.base');
            Blade::component(\Marketplaceful\View\Components\Layouts\Dashboard::class, 'mkt-layouts.dashboard');
        });
    }

    protected function registerComponent(string $component)
    {
        Blade::component('marketplaceful::components.'.$component, 'mkt-'.$component);
    }

    protected function configurePublishing()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__ . '/../config/marketplaceful.php' => config_path('marketplaceful.php'),
        ], 'marketplaceful-config');

        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/marketplaceful'),
        ], 'marketplaceful-views');

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'marketplaceful-migrations');

        $this->publishes([
            __DIR__.'/../routes/web.php' => base_path('routes/marketplaceful.php'),
        ], 'marketplaceful-routes');

        $this->publishes([
            __DIR__.'/../resources/dist' => public_path('vendor/marketplaceful/dashboard'),
        ], 'marketplaceful-dashboard');

        $this->publishes([
            __DIR__.'/../stubs/Providers/MarketplacefulServiceProvider.stub.php' => app_path('Providers/MarketplacefulServiceProvider.php'),
        ], 'marketplaceful-providers');
    }

    protected function configureRoutes()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }

    protected function configureCommands()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            InstallCommand::class,
            MakeUser::class,
        ]);
    }

    protected function configureGates()
    {
        Gate::define('viewMarketplaceful', fn ($user = null) => $user->isOwner());
    }
}
