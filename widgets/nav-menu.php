<?php

namespace TechiePress\ElementorWidgets\Widgets;
use Elementor\Widget_Base;

class Nav_Menu extends Widget_Base{
    public function get_name(){
        return 'TechiePress menu';
    }

    public function get_title(){
        return _('Techiepress Menu', 'techiepress-elementor-widgets');
    }


    public function get_icon(){
        // return 'fa fa-menu';
        return 'eicon-nav-menu';
    }

    public function get_categories(){
        return ['basic'];
    }

    public function _register_control(){

    }

    public function render(){

    }

    public function _content_template(){

    }


}




