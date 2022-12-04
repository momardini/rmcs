<div
    wire:ignore
    x-data="{pond: null}"
    x-init="
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.registerPlugin(FilePondPluginFileValidateType);
        pond = FilePond.create($refs.input, {
        allowMultiple: {{ isset($attributes['multiple']) ? 'true' : 'false' }},
        labelIdle:`
        <img src='{{url('/storage/resource/upload.png')}}' class='w-8' />
        `,
            @if(isset($attributes['files']))
                    files: [
                    @foreach($attributes['files'] as $image)
                        {
                        source: '{{ str_replace('\\', '/', Storage::disk(config('voyager.storage.disk'))->url($image)) }}'
                      },
                    @endforeach
                  ]
                @endif

        });
        pond.setOptions({
            acceptedFileTypes:['image/*','video/quicktime', 'video/mp4','application/pdf'],
            imagePreviewMaxHeight:100,

            {{ isset($attributes['capture']) ? "captureMethod:'camera', " : '' }}
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('{{ $attributes['wire:model'] }}', file, (fieldName) => {load(fieldName);}, error, progress);
                },
                revert: (filename, load) => {
                    @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                },

            },
        });

    "
>
    <input type="file" x-ref="input">
</div>
