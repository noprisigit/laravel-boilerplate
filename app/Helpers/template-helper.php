<?php

if (!function_exists('get_admin_template_base_path')) {
    /**
     * Get the base folder for the active admin template
     *
     * @return string
     */
    function get_admin_template_base_path(): string
    {
        $template = config('app.admin_template', 'default');

        return "backend/$template";
    }
}

if (!function_exists('get_auth_template_base_path')) {
    /**
     * Get the base folder for the active auth template
     *
     * @return string
     */
    function get_auth_template_base_path(): string
    {
        $template = config('app.admin_template', 'default');

        return "auth/$template";
    }
}
