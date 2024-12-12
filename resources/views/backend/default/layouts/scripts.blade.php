<div class="scrollToTop">
    <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
</div>
<div id="responsive-overlay"></div>

@livewireScripts

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Popper JS -->
<script src="{{ asset(get_admin_template_base_path() . '/libs/@popperjs/core/umd/popper.min.js') }}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset(get_admin_template_base_path() . '/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Defaultmenu JS -->
<script src="{{ asset(get_admin_template_base_path() . '/js/defaultmenu.min.js') }}"></script>

<!-- Node Waves JS-->
<script src="{{ asset(get_admin_template_base_path() . '/libs/node-waves/waves.min.js') }}"></script>

<!-- Sticky JS -->
<script src="{{ asset(get_admin_template_base_path() . '/js/sticky.js') }}"></script>

<!-- Simplebar JS -->
<script src="{{ asset(get_admin_template_base_path() . '/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset(get_admin_template_base_path() . '/js/simplebar.js') }}"></script>

<!-- Color Picker JS -->
<script src="{{ asset(get_admin_template_base_path() . '/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

<!-- Custom-Switcher JS -->
<script src="{{ asset(get_admin_template_base_path() . '/js/custom-switcher.min.js') }}"></script>

@include(get_admin_template_base_path() . '.components.toast')
@include(get_admin_template_base_path() . '.components.modal-delete-confirmation')

<!-- Custom JS -->
<script src="{{ asset(get_admin_template_base_path() . '/js/custom.js') }}"></script>

<script>
    window.addEventListener('closeModal', (event) => {
        $(`#${event.detail[0].modalId}`).modal('hide');
    });
</script>
