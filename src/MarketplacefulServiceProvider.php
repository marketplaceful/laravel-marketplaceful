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
use Marketplaceful\Http\Livewire\Portal\Listings\CheckoutForm;
use Marketplaceful\Http\Livewire\Portal\Listings\CreateListing;
use Marketplaceful\Http\Livewire\Portal\Listings\CreateListingForm;
use Marketplaceful\Http\Livewire\Portal\Listings\ShowCheckout;
use Marketplaceful\Http\Livewire\Portal\Listings\ShowListing;
use Marketplaceful\Http\Livewire\Portal\Listings\ShowListings;
use Marketplaceful\Http\Livewire\Portal\Listings\UpdateListingForm;
use Marketplaceful\Http\Livewire\Portal\Orders\AcceptOrderForm;
use Marketplaceful\Http\Livewire\Portal\Orders\DeclineOrderForm;
use Marketplaceful\Http\Livewire\Portal\Orders\DeliverOrderForm;
use Marketplaceful\Http\Livewire\Portal\Orders\OrderList;
use Marketplaceful\Http\Livewire\Portal\Orders\ShowOrder;
use Marketplaceful\Http\Livewire\Portal\Orders\ShowOrders;
use Marketplaceful\Http\Livewire\Portal\Profile\ShowProfile;
use Marketplaceful\Http\Livewire\Portal\Profile\UpdatePasswordForm;
use Marketplaceful\Http\Livewire\Portal\Profile\UpdateProfileInformationForm;
use Marketplaceful\Http\Livewire\Portal\Sales\ShowSale;
use Marketplaceful\Http\Livewire\Portal\Sales\ShowSales;
use Marketplaceful\Http\Livewire\Portal\Welcome;
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
            Livewire::component('marketplaceful::portal.welcome', Welcome::class);
            Livewire::component('marketplaceful::portal.profile', ShowProfile::class);
            Livewire::component('marketplaceful::portal.update-profile-information-form', UpdateProfileInformationForm::class);
            Livewire::component('marketplaceful::portal.update-password-form', UpdatePasswordForm::class);

            Livewire::component('marketplaceful::portal.listings.show-listings', ShowListings::class);
            Livewire::component('marketplaceful::portal.listings.create-listing', CreateListing::class);
            Livewire::component('marketplaceful::portal.listings.create-listing-form', CreateListingForm::class);
            Livewire::component('marketplaceful::portal.listings.show-listing', ShowListing::class);
            Livewire::component('marketplaceful::portal.listings.update-listing-form', UpdateListingForm::class);
            Livewire::component('marketplaceful::portal.listings.show-checkout', ShowCheckout::class);
            Livewire::component('marketplaceful::portal.listings.checkout-form', CheckoutForm::class);

            Livewire::component('marketplaceful::portal.conversations.show-conversations', ShowConversations::class);
            Livewire::component('marketplaceful::portal.conversations.show-conversation', ShowConversation::class);
            Livewire::component('marketplaceful::portal.conversations.conversation-list', ConversationList::class);
            Livewire::component('marketplaceful::portal.conversations.create-conversation-form', CreateConversationForm::class);
            Livewire::component('marketplaceful::portal.conversations.message', Message::class);
            Livewire::component('marketplaceful::portal.conversations.message-list', MessageList::class);
            Livewire::component('marketplaceful::portal.conversations.message-own', MessageOwn::class);
            Livewire::component('marketplaceful::portal.conversations.reply-conversation-form', ReplyConversationForm::class);

            Livewire::component('marketplaceful::portal.orders.show-orders', ShowOrders::class);
            Livewire::component('marketplaceful::portal.orders.show-order', ShowOrder::class);
            Livewire::component('marketplaceful::portal.orders.accept-order-form', AcceptOrderForm::class);
            Livewire::component('marketplaceful::portal.orders.decline-order-form', DeclineOrderForm::class);
            Livewire::component('marketplaceful::portal.orders.deliver-order-form', DeliverOrderForm::class);
            Livewire::component('marketplaceful::portal.orders.order-list', OrderList::class);

            Livewire::component('marketplaceful::portal.sales.show-sales', ShowSales::class);
            Livewire::component('marketplaceful::portal.sales.show-sale', ShowSale::class);
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

            $this->registerComponent('button');
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
            $this->registerComponent('form.portal-section');
            $this->registerComponent('form.portal-section-title');
            $this->registerComponent('button.secondary');

            $this->registerComponent('header.portal');

            $this->registerComponent('navigation.portal-link');
            $this->registerComponent('navigation.responsive-portal-link');

            Blade::component(\Marketplaceful\View\Components\Layouts\Html::class, 'mkt-layouts.html');
            Blade::component(\Marketplaceful\View\Components\Layouts\Guest::class, 'mkt-layouts.guest');
            Blade::component(\Marketplaceful\View\Components\Layouts\Guest::class, 'mkt-layouts.portal');
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
        Gate::define('viewMarketplaceful', fn ($user = null) => $user->belongsToStaff());
    }
}
