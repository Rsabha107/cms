<div class="modal fade" id="add_business_address_modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-top">
        <div class="modal-content ">
            <div class="modal-header bg-modal-header">
                <h3 class="mb-0" id="add_business_address_modal_label"><?= get_label('add_business_address', 'Add Business address') ?></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php
            $workspace_id = session()->get('workspace_id');
            $is_workspace_id_set = ($workspace_id) ? true : false;
            //
            ?>
            <form class="row g-3  px-3 needs-validation form-submit-event" id="add_business_address_form" novalidate="" action="{{ route ('general.settings.address.store') }}" method="POST">
                @csrf

                <input type="hidden" id="add_business_address_table_h" name="table" value="business_address_table">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Location Name</label>
                                <input name="location_name" id="add_location_name" class="form-control" type="text" placeholder="" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Address1</label>
                                <input name="address1" maxlength="150" id="add_business_address1" class="form-control" type="text" placeholder="" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Address2</label>
                                <input name="address2" maxlength="150" id="add_business_address2" class="form-control" type="text" placeholder="Address2">
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="form-label" for="inputEmail4">City</label>
                                    <input name="city" maxlength="50" id="add_city" class="form-control" type="text" placeholder="City" required>
                                </div>

                                <div class="col-md-2">
                                    <label class="form-label" for="inputEmail4">State</label>
                                    <input name="state" id="add_state" maxlength="10" class="form-control" type="text" placeholder="State">
                                </div>

                                <div class="col-md-5">
                                    <label class="form-label" for="inputEmail4">Zipcode</label>
                                    <input name="zipcode" maxlength="15" id="add_zipcode" class="form-control" type="text" placeholder="00000">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="inputEmail4">Country</label>
                                <select class="form-select" name="country_id" id="add_business_address_country_id" required>
                                    <option value="">Select...</option>
                                    @foreach ($countries as $key => $item )
                                    <option value="{{ $item->id  }}">
                                        {{ $item->country_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="flexCheckDefault" name="default_address" type="checkbox" value="Y" />
                                <label class="form-check-label" for="flexCheckDefault">Default address</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><?= get_label('close', 'Close') ?></label></button>
                    <button type="submit" class="btn btn-primary" id="submit_btn"><?= get_label('save', 'Save') ?></label></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_business_address_modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-top">
        <div class="modal-content bg-body-highlight">
            <div class="modal-header bg-modal-header">
                <h3 class="mb-0" id="add_business_address_modal_label"><?= get_label('edit_business_address', 'Edit Busniess Address') ?></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3  px-3 needs-validation form-submit-event" id="edit_business_address_form" novalidate="" action="{{ route ('general.settings.address.update') }}" method="POST">
                @csrf
                <div id="business_addressEditView"></div>
            </form>
        </div>
    </div>
</div>

<!-- </div> -->