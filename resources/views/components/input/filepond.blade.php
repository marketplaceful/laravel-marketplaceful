@props(['files' => []])

<div
    wire:ignore
    x-data="{
        pond: '',
        files: [
            @foreach ($files as $file)
                { source: '{{ $file['source'] }}', url: '{{ $file['url'] }}', origin: '{{ $file['origin'] }}' },
            @endforeach
        ],
        photos: @entangle('photos').defer,
        getFilesForFilepond() {
            return this.files.map(file => { return { source: file.source, options: { type: 'local' } } })
        },
        getUrl(source) {
            index = this.files.findIndex(file => file.source == source);
            return this.files[index].url;
        },
        updatePhotos() {
            this.photos = this.pond.getFiles().map(file => { return { source: file.serverId, origin: file.origin } });
        }
    }"
    x-init="
        FilePond.registerPlugin(FilePondPluginImagePreview);
        pond = FilePond.create($refs.input);
        pond.setOptions({
             allowReorder: true,
             allowMultiple: {{ isset($attributes['multiple']) ? 'true' : 'false' }},
             server: {
                 process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                     @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
                 },
                 revert: (filename, load) => {
                     @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                 },
                 load: (source, load, error, progress, abort, headers) => {
                     fetch(getUrl(source))
                        .then(response => response.blob())
                        .then(image => load(image))
                },
             },
         });
         pond.on('processfile', (error, file) => {
            if (error) return;

            updatePhotos();
        });
        pond.on('removefile', (error, file) => {
            updatePhotos();
        });
        pond.on('reorderfiles', (files, origin, target) => {
            updatePhotos();
        });
        pond.files = getFilesForFilepond();
     "
     {!! $attributes->whereDoesntStartWith('wire:model')->merge(['class' => 'px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md']) !!}
 >
     <input type="file" x-ref="input">
 </div>
