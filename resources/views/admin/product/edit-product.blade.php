@extends('admin.layouts.main')

@section('title', 'Edit Product')

@section('head_title', 'Edit Product')
@push('top_css')
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
          rel="stylesheet"/>
@endpush
@section('content')

    <div class="row g-gs">
        <form class="row" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-inner">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="form-group">
                                    <label class="form-label" for="product-title">Product Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="product_name" id="product-title"
                                               placeholder="Product Name" value="{{$product->name}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-4">
                                <div class="form-group">
                                    <label class="form-label" for="basic-url">Slug</label>
                                    <div class="form-control-wrap">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">{{url('/').'/products/'}}</span>
                                            </div>
                                            <input type="text" class="form-control" id="product-slug" name="product_slug" value="{{$product->slug}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-4">
                                <div class="form-group">
                                    <label class="form-label" for="product-title">Product Description</label>
                                    <div class="form-control-wrap">
                                        <!-- Create the editor container -->
                                        <div id="product-description-container">
                                        </div>
                                        <input name="product_description" type="hidden" required value="{{old('product_description')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="form-group">
                                    <label class="form-label" for="regular-price">Regular Price</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" name="product_price" min="0" step="0.01"
                                               id="regular-price" placeholder="Regular Price" value="{{$product->regular_price}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="form-group">
                                    <label class="form-label" for="regular-price">Discount </label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" name="product_discount"
                                               id="regular-price" placeholder="Discount amount" value="{{$product->discount_price}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">

                                <div class="form-group">
                                    <label class="form-label">Discount Type</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" data-placeholder="Select Discount Type" name="product_discount_type">
                                            <option value="amount" {{$product->discount_type === 'amount' ? 'selected':''}}>Fixed</option>
                                            <option value="percent" {{$product->discount_type === 'percent' ? 'selected':''}}>Percentage</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label class="form-label" for="stock">Stock</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="product_stock" id="stock"
                                               placeholder="Stock" value="{{$product->stock}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label class="form-label" for="SKU">SKU</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="product_sku" id="SKU" placeholder="SKU" value="{{$product->sku}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="form-group">
                                    <label class="form-label">Product Images</label>
                                    <div class="form-control-wrap">
                                        <input type="file"
                                               class="filepond"
                                               name="product_images[]"
                                               data-max-file-size="3MB">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card" id="variation-section">
                    <div class="card-inner">
                        <h5 class="card-title">Product variation</h5>

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="form-group">
                                    <label for="attributes">Attributes (Select multiple)</label>
                                    <select id="attributes" class="form-control js-select2" multiple>
                                        <!-- Populate with available attributes -->
                                        @foreach ($attributes as $attribute)
                                            <option
                                                value="{{ $attribute->id }}">{{ $attribute->attribute_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="col-lg-6">

                            </div>
                        </div>

                        <div class="row" id="attribute-values">

                        </div>

                        <button type="button" id="add-variation" class="btn btn-primary mt-3">Add Variation</button>


                        <div class="row mt-5">
                            <div class="col-lg-12">

                                <table class="table table-bordered text-center align-middle variation-table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Picture</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="variation-fields">

                                    @if(old('variations') !== null)
                                        @php
                                            $oldVariations = old('variations');
                                        @endphp

                                        @dump($oldVariations)

                                        @for ($i = 0; $i < count($oldVariations['price']); $i++)
                                            @php
                                                $attr = json_decode($oldVariations['attributes'][$i], true);
                                            @endphp
                                            <tr class="variation">
                                                <td>
                                                    @foreach ($attr as $attribute => $value)
                                                        {{ $value }},
                                                    @endforeach
                                                </td>
                                                <td><input type="number" name="variations[price][]"
                                                           value="{{ $oldVariations['price'][$i] }}" min="0" step="0.01"
                                                           class="form-control" placeholder="Price" required></td>
                                                <td><input type="number" name="variations[quantity][]"
                                                           value="{{ $oldVariations['quantity'][$i] }}" class="form-control"
                                                           placeholder="Quantity" required></td>
                                                <td><input type="file" class="form-control" id="customFile"
                                                           accept="image/*" name="variations[image][]" value=""></td>
                                                <input type="hidden" name="variations[attributes][]"
                                                       value='{{ json_encode($attr) }}'>
                                                <td>
                                                    <button type="button" class="btn btn-danger remove-variation" style="">
                                                        &times;
                                                    </button>
                                                </td>
                                            </tr>

                                        @endfor
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-inner">
                                <div class="form-group">
                                    <label class="form-label">Product Thumbnail</label>
                                    <div class="form-control-wrap">

                                        <input type="file"
                                               name="thumbnail"
                                               data-max-file-size="3MB" data-accept="image/jpeg, image/png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-inner">
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select " data-placeholder="Select product status" name="product_status">
                                            <option value="active" {{old('product_status') === 'active' ? 'selected':''}}>Active</option>
                                            <option value="inactive" {{old('product_status') === 'inactive' ? 'selected':''}}>Inactive</option>
                                            <option value="draft" {{old('product_status', 'draft') === 'draft' ? 'selected':''}}>Draft</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-inner">
                                <div class="form-group">
                                    <label class="form-label">Product Type</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" data-placeholder="Select type" name="product_type" id="product-type">
                                            <option value="simple" {{old('product_type', 'simple') === 'simple' ? 'selected':''}}>Simple</option>
                                            <option value="variable" {{old('product_type') === 'variable' ? 'selected':''}}>Variable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-inner row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Main Category</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select js-select2 main-category" data-placeholder="Select Category" name="product_category">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Sub Category</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select js-select2 subcategory"
                                                    data-placeholder="Select sub category" name="product_sub_category">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-inner">
                                <div class="form-group">
                                    <label class="form-label">Product tags</label>
                                    <div class="form-control-wrap">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Product Tag"
                                                   name="product_tags" value="{{$product->tags}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <button class="btn btn-primary mt-3" type="submit"><em class="icon ni ni-plus"></em><span>Add New</span>
                </button>
            </div>

        </form>
    </div>

@endsection

@push('bottom_js')
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/editors/quill.css?ver=3.2.3') }}">
    <script src="{{ asset('admin/assets/js/libs/editors/quill.js?ver=3.2.3') }}"></script>
    <script src="{{ asset('admin/assets/js/editors.js?ver=3.2.3') }}"></script>
    <script src="{{ asset('admin/assets/js/libs/tagify.js') }}"></script>
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const thumbPond = FilePond.create(document.querySelector('input[name="thumbnail"]'), {
            credits: false,
            acceptedFileTypes: ['image/jpeg', 'image/png', 'image/gif'],
            imagePreviewHeight: 170,
            labelIdle: `Drag & Drop your product thumbnail or <span class="filepond--label-action">Browse</span>`,
            allowMultiple: false,

        });

        let existingThumb = "{{$product->thumbnail}}"

        thumbPond.setOptions({
            files: [
                {
                    source: existingThumb,
                    options: {
                        type: 'local' // Indicate that this is an existing file
                    }
                }
            ],
            server: {
                process: '{{route('upload.thumbnail')}}',
                fetch: null,
                restore: '{{route('restore.thumbnail').'?restore='}}',
                load: (uniqueFileId, load) => {
                    fetch('https://ecommerce.test/file/thumbnail/restore?restore='+uniqueFileId)
                        .then(res => res.blob())
                        .then(load);
                },
                revert: '{{route('delete.thumbnail')}}',
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            },

        })

        const proImgPond = FilePond.create(document.querySelector('input[name="product_images[]"]'), {
            acceptedFileTypes: ['image/*'],
            labelIdle: `Drag & Drop your product image or <span class="filepond--label-action">Browse</span>`,
            credits: false,
            imagePreviewHeight: 170,
            allowMultiple: true,
            maxFiles: 5,
            allowReorder: false,
        });

        let existingProductImage = @json(json_decode($product->product_images));


        proImgPond.setOptions({
            server: {
                process: '{{route('upload.product-image')}}',
                fetch: null,
                restore: '{{route('restore.product-image').'?restore='}}',
                revert: '{{route('delete.product-image')}}',
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            },
            files: existingProductImage.map(image => (
                {
                    source: image,
                    options: {
                        type: 'limbo'
                    }
                }
            ))
        })

        const input = document.querySelector('input[name="product_tags"]');
        new Tagify(input);

        $(document).ready(function () {
            $('.main-category').change(function () {
                const mainCategoryId = $(this).val();
                $.get('{{ route('get-sub-categories') }}', {child_id: mainCategoryId}, function (data) {
                    const subCategorySelect = $('.subcategory');
                    subCategorySelect.empty();
                    $.each(data, function (index, subCategory) {
                        subCategorySelect.append($('<option>', {
                            value: subCategory.id,
                            text: subCategory.name
                        }));
                    });
                })
            })
        })

    </script>

    <script>
        $(document).ready(function () {
            const selectedCombinations = [];
            const variationTable = $('.variation-table');
            $('#attributes').on('change', function () {
                const selectedAttributes = $(this).val();

                $('#attribute-values').empty();

                if (selectedAttributes) {
                    selectedAttributes.forEach(function (attributeId) {
                        // AJAX request to retrieve attribute values based on attributeId
                        $.ajax({
                            url: '/admin/get-attribute-values/' + attributeId,
                            success: function (attributeValues) {
                                let attributeSelect = '<div class="col-lg-4"><div class="form-group">';
                                const attributeName = $("#attributes option[value='" + attributeId + "']").text();
                                attributeSelect += '<label>' + attributeName + '</label>';
                                attributeSelect += '<select name="attributes[' + attributeId + '][]" class="attribute-select attributesVal form-control js-select2">';
                                attributeValues.forEach(function (value) {
                                    attributeSelect += '<option value="' + value.id + '">' + value.attribute_value + '</option>';
                                });
                                attributeSelect += '</select>';
                                attributeSelect += '</div></div>';
                                $('#attribute-values').append(attributeSelect);
                                $('.attribute-select').select2()
                            },
                            error: function () {
                                // Handle errors
                            }
                        });
                    });
                }
            });

            $('#add-variation').click(function () {
                const hasSelectedAttributes = $('.attributesVal').filter(function () {
                    return $(this).val() && $(this).val().length > 0;
                }).length > 0;

                if (!hasSelectedAttributes) {
                    NioApp.Toast('Please select at least one attribute and its value.', 'warning', {position: 'bottom-right'});
                    return;
                }

                const selectedAttributes = {};

                $('.attributesVal').each(function () {
                    const attributeName = $(this).prev('label').text();
                    selectedAttributes[attributeName] = $(this).find('option:selected').text();
                });

                const combinationKey = JSON.stringify(selectedAttributes);
                if (selectedCombinations.includes(combinationKey)) {
                    NioApp.Toast('This combination already exists.', 'info', {position: 'bottom-right'});
                    return;
                }
                const variationName = Object.values(selectedAttributes).join(', ');

                let variationField = '<tr class="variation">';
                variationField += '<td>' + variationName + '</td>';
                variationField += '<td><input type="number" name="variations[price][]" value="" min="0" step="0.01" class="form-control" placeholder="Price" required></td>';
                variationField += '<td><input type="number" name="variations[quantity][]" class="form-control" placeholder="Quantity" required></td>';
                variationField += '<td><input type="file" name="variations[image][]" class="form-control" id="customFile" accept="image/*"></td>';
                variationField += '<input type="hidden" name="variations[attributes][]" value=\'' + JSON.stringify(selectedAttributes) + '\'>';
                variationField += '<td><button type="button" class="btn btn-danger remove-variation" style="">&times;</button></td>'
                selectedCombinations.push(combinationKey);

                $('#variation-fields').append(variationField);
                variationTable.show();
            });

            $('#variation-fields').on('click', '.remove-variation', function () {
                const variationField = $(this).closest('.variation');

                // Retrieve the hidden input value to get the variation's attributes
                const attributesJSON = variationField.find('input[type="hidden"]').val();
                const variationAttributes = JSON.parse(attributesJSON);
                const combinationKey = JSON.stringify(variationAttributes);
                const index = selectedCombinations.indexOf(combinationKey);
                if (index !== -1) {
                    selectedCombinations.splice(index, 1);
                }
                variationField.remove();

                if ($('#variation-fields tr').length === 0) {
                    variationTable.hide();
                }
            });

            let vartr = $('#variation-fields tr');

            vartr.each(function () {
                const attributesJSON = $(this).find('input[type="hidden"]').val();
                const variationAttributes = JSON.parse(attributesJSON);
                const combinationKey = JSON.stringify(variationAttributes);
                selectedCombinations.push(combinationKey);
            });

            if (vartr.length === 0) {
                variationTable.hide();
            }

        });
    </script>

    <script>
        $(document).ready(function () {
            $('#product-title').on('input', function () {

                const name = $(this).val();
                const generatedSlug = generateSlug(name);

                $.ajax({
                    url: '{{route('products.unique-slug')}}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    data: {slug: generatedSlug},
                    success: function (response) {
                        if (response.unique) {
                            $('#product-slug').val(generatedSlug);
                        } else {
                            const uniqueSlug = modifySlugForUniqueness(generatedSlug, response.suggestedSlug);
                            $('#product-slug').val(uniqueSlug);
                        }
                    }
                });


            })
        })

        function generateSlug(text) {
            return text
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/(^-|-$)+/g, '');
        }

        function modifySlugForUniqueness(slug, suggestedSlug) {
            return slug + '-' + suggestedSlug;
        }

    </script>

    <script>


        $(document).ready(function() {
            let selectElement = $('#product-type');

            let sectionToToggle = $('#variation-section');

            if (selectElement.val() === 'simple') {
                sectionToToggle.hide();
            }

            selectElement.on('change', function() {
                if (selectElement.val() === 'variable') {
                    sectionToToggle.show();
                } else {
                    sectionToToggle.hide();
                }
            });


            let quill = new Quill('#product-description-container', {
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        ['blockquote', 'code-block'],
                        [{'list': 'ordered'}, {'list': 'bullet'}],
                        [{'script': 'sub'}, {'script': 'super'}],
                        [{'indent': '-1'}, {'indent': '+1'}],
                        [{'header': [1, 2, 3, 4, 5, 6]}],
                        [{'color': []}, {'background': []}],
                        [{'font': []}],
                        [{'align': []}],
                        ['clean']]
                },
                placeholder: 'Write a product description',
                theme: 'snow'
            });
            let about = $('input[name=product_description]');

            $('form').on('submit', function() {
                about.val(JSON.stringify(quill.getContents()));
            });


            let old = {!! $product->long_description !!};
            quill.setContents(old);


        });
    </script>

@endpush
