<div wire:ignore  class="" x-data x-init=" 
FilePond.registerPlugin(FilePondPluginImagePreview);
FilePond.create($refs.fileInput,{
        server:{
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
                },
                revert: (filename, load) => {
                    @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                }
            }
        })
">
    <input {{ $attributes->whereStartsWith('multiple') }} {{ $attributes->whereStartsWith('required') }} {{ $attributes->whereStartsWith('data') }} x-cloak  x-ref="fileInput" type="file">
</div>