<div class="offcanvas offcanvas-end offcanvas-global-modal in" id="offcanvas-edit-purchase-modal" tabindex="-1"
    aria-labelledby="offcanvasWithBackdropLabel">
    <a class="close-task-detail in" id="close-task-detail" style="display: block;" data-bs-dismiss="offcanvas">
        <span><svg class="svg-inline--fa fa-times fa-w-11" aria-hidden="true" focusable="false" data-prefix="fa"
                data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"
                data-fa-i2svg="">
                <path fill="currentColor"
                    d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z">
                </path>
            </svg><!-- <i class="fa fa-times"></i> Font Awesome fontawesome.com --></span>
    </a>
    <div class="offcanvas-body">
        <div class="row">
            <div class="col-sm-12">
                <form class="row g-3 needs-validation form-submit-event" id="edit_purchase_form" novalidate=""
                    action="{{ route('cms.orders.update') }}" method="POST">
                    @csrf
                    <div id="global-edit-purchase-content"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end offcanvas-global-modal in95" id="offcanvas-add-order-modal" tabindex="-1"
    aria-labelledby="offcanvasWithBackdropLabel">
    <a class="close-task-detail in" id="close-task-detail" style="display: block;" data-bs-dismiss="offcanvas">
        <span><svg class="svg-inline--fa fa-times fa-w-11" aria-hidden="true" focusable="false" data-prefix="fa"
                data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"
                data-fa-i2svg="">
                <path fill="currentColor"
                    d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z">
                </path>
            </svg><!-- <i class="fa fa-times"></i> Font Awesome fontawesome.com --></span>
    </a>
    <x-cms.orders.customer-order-drawer id="" formAction="{{ route('cms.orders.customer.store') }}" currency="anything"
        formId="add_purchase_form" :customers="$customers" :products="$products" :currency="$currency" :addresses="$addresses"
        :serviceTimes="$service_times" :venues="$venues" :serviceLocations="$service_locations">

    </x-cms.orders.admin-order-drawer>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="order_lines_modal"  data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addDealModal" aria-hidden="true">
    <div class="modal-dialog custom-modal-width modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-body-highlight">
            <div class="modal-header justify-content-between border-0 px-6">
                <h3 class="mb-0">Order Details</h3>
                <button class="btn btn-sm btn-phoenix-secondary" data-bs-dismiss="modal" aria-label="Close"><span
                        class="fas fa-times text-danger"></span></button>
            </div>
            <div class="modal-content px-6">
                <div id="order_lines_modal_body"></div>

            </div>
            <div class="modal-footer border-0pt-4 px-6">
                <button class="btn btn-link text-danger px-3 my-0" data-bs-dismiss="modal"
                    aria-label="Close">Cancel</button>
                {{-- <button class="btn btn-primary my-0">Create Deal</button> --}}
            </div>
        </div>
    </div>
</div>

<!-- </div> -->
