<?php

/* themes/custom/mta/templates/navigation/menu.html.twig */
class __TwigTemplate_8aa813da608f83d5c0065f6739945a6d55fc03f04ce376ab6e39d9adaf55944f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("import" => 21, "macro" => 28, "if" => 31, "for" => 41, "set" => 43);
        $filters = array("clean_class" => 35, "render" => 54, "without" => 59);
        $functions = array("cycle" => 37, "link" => 63);

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('import', 'macro', 'if', 'for', 'set'),
                array('clean_class', 'render', 'without'),
                array('cycle', 'link')
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 21
        $context["menus"] = $this;
        // line 26
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["menus"]->getmenu_links((isset($context["items"]) ? $context["items"] : null), (isset($context["attributes"]) ? $context["attributes"] : null), 0, (isset($context["menu_name"]) ? $context["menu_name"] : null))));
        echo "

";
    }

    // line 28
    public function getmenu_links($__items__ = null, $__attributes__ = null, $__menu_level__ = null, $__menu_name__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "items" => $__items__,
            "attributes" => $__attributes__,
            "menu_level" => $__menu_level__,
            "menu_name" => $__menu_name__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 29
            $context["menus"] = $this;
            // line 31
            if ((isset($context["items"]) ? $context["items"] : null)) {
                // line 32
                echo "
    <ul";
                // line 34
                if (((isset($context["menu_level"]) ? $context["menu_level"] : null) == 0)) {
                    // line 35
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => array(0 => "menu", 1 => "odd", 2 => "menu-level-1", 3 => (((isset($context["menu_name"]) ? $context["menu_name"] : null)) ? (("menu-name--" . \Drupal\Component\Utility\Html::getClass((isset($context["menu_name"]) ? $context["menu_name"] : null)))) : ("")))), "method"), "html", null, true));
                } else {
                    // line 37
                    echo "      class=\"menu is-child ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), (isset($context["menu_level"]) ? $context["menu_level"] : null)), "html", null, true));
                    echo " ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, ("menu-level-" . ((isset($context["menu_level"]) ? $context["menu_level"] : null) + 1)), "html", null, true));
                    echo "\"";
                }
                // line 39
                echo ">";
                // line 41
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 43
                    $context["is_parent"] = false;
                    // line 44
                    echo "      ";
                    if (($this->getAttribute($context["item"], "below", array()) && $this->getAttribute($context["item"], "is_expanded", array()))) {
                        // line 45
                        echo "        ";
                        $context["is_parent"] = true;
                        // line 46
                        echo "      ";
                    }
                    // line 47
                    echo "
      ";
                    // line 48
                    $context["item_classes"] = array(0 => "menu__item", 1 => ((                    // line 50
(isset($context["is_parent"]) ? $context["is_parent"] : null)) ? ("is-parent") : ("")), 2 => (($this->getAttribute(                    // line 51
$context["item"], "is_expanded", array())) ? ("menu__item--expanded") : ("")), 3 => (($this->getAttribute(                    // line 52
$context["item"], "is_collapsed", array())) ? ("menu__item--collapsed") : ("")), 4 => (($this->getAttribute(                    // line 53
$context["item"], "in_active_trail", array())) ? ("menu__item--active-trail") : ("")), 5 => ("menu__item-title--" . \Drupal\Component\Utility\Html::getClass($this->env->getExtension('drupal_core')->renderVar($this->getAttribute(                    // line 54
$context["item"], "title", array())))));
                    // line 57
                    echo "
      ";
                    // line 59
                    echo "      <li";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, twig_without($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "attributes", array()), "addClass", array(0 => (isset($context["item_classes"]) ? $context["item_classes"] : null)), "method"), "setAttribute", array(0 => "id", 1 => ("mlid-" . \Drupal\Component\Utility\Html::getClass($this->env->getExtension('drupal_core')->renderVar($this->getAttribute($context["item"], "title", array()))))), "method"), "role"), "html", null, true));
                    echo ">

        <span class=\"menu__link--wrapper";
                    // line 61
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((((isset($context["is_parent"]) ? $context["is_parent"] : null)) ? (" is-parent__wrapper") : (""))));
                    echo "\">
          ";
                    // line 62
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->env->getExtension('drupal_core')->getLink($this->getAttribute(                    // line 64
$context["item"], "title", array()), $this->getAttribute(                    // line 65
$context["item"], "url", array()), twig_without($this->getAttribute($this->getAttribute($this->getAttribute(                    // line 66
$context["item"], "attributes", array()), "removeClass", array(0 => (isset($context["item_classes"]) ? $context["item_classes"] : null)), "method"), "addClass", array(0 => "menu__link"), "method"), "id", "role")), "html", null, true));
                    // line 68
                    echo "
        </span>

        ";
                    // line 71
                    if ($this->getAttribute($context["item"], "below", array())) {
                        // line 72
                        echo "          ";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["menus"]->getmenu_links($this->getAttribute($context["item"], "below", array()), (isset($context["attributes"]) ? $context["attributes"] : null), ((isset($context["menu_level"]) ? $context["menu_level"] : null) + 1), (isset($context["menu_name"]) ? $context["menu_name"] : null))));
                        echo "
        ";
                    }
                    // line 74
                    echo "
      </li>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 79
                echo "</ul>
  ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "themes/custom/mta/templates/navigation/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 79,  144 => 74,  138 => 72,  136 => 71,  131 => 68,  129 => 66,  128 => 65,  127 => 64,  126 => 62,  122 => 61,  116 => 59,  113 => 57,  111 => 54,  110 => 53,  109 => 52,  108 => 51,  107 => 50,  106 => 48,  103 => 47,  100 => 46,  97 => 45,  94 => 44,  92 => 43,  88 => 41,  86 => 39,  79 => 37,  76 => 35,  74 => 34,  71 => 32,  69 => 31,  67 => 29,  52 => 28,  45 => 26,  43 => 21,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override to display a menu.*/
/*  **/
/*  * Available variables:*/
/*  * - menu_name: The machine name of the menu.*/
/*  * - items: A nested list of menu items. Each menu item contains:*/
/*  *   - attributes: HTML attributes for the menu item.*/
/*  *   - below: The menu item child items.*/
/*  *   - title: The menu link title.*/
/*  *   - url: The menu link url, instance of \Drupal\Core\Url*/
/*  *   - localized_options: Menu link localized options.*/
/*  *   - is_expanded: TRUE if the link has visible children within the current*/
/*  *     menu tree.*/
/*  *   - is_collapsed: TRUE if the link has children within the current menu tree*/
/*  *     that are not currently visible.*/
/*  *   - in_active_trail: TRUE if the link is in the active trail.*/
/*  *//* */
/* #}*/
/* {%- import _self as menus -%}*/
/* {#*/
/*   We call a macro which calls itself to render the full tree.*/
/*   @see http://twig.sensiolabs.org/doc/tags/macro.html*/
/* #}*/
/* {{ menus.menu_links(items, attributes, 0, menu_name) }}*/
/* */
/* {% macro menu_links(items, attributes, menu_level, menu_name) %}*/
/*   {%- import _self as menus -%}*/
/* */
/*   {% if items %}*/
/* */
/*     <ul*/
/*     {%- if menu_level == 0 -%}*/
/*       {{ attributes.addClass(['menu', 'odd', 'menu-level-1', menu_name ? 'menu-name--' ~ menu_name|clean_class ]) }}*/
/*     {%- else %}*/
/*       class="menu is-child {{ cycle(['odd', 'even'], menu_level) }} {{ 'menu-level-' ~ (menu_level + 1) }}"*/
/*     {%- endif -%}*/
/*     >*/
/* */
/*     {%- for item in items -%}*/
/* */
/*       {% set is_parent = false %}*/
/*       {% if item.below and item.is_expanded %}*/
/*         {% set is_parent = true %}*/
/*       {% endif %}*/
/* */
/*       {% set item_classes = [*/
/*           'menu__item',*/
/*           is_parent ? 'is-parent',*/
/*           item.is_expanded ? 'menu__item--expanded',*/
/*           item.is_collapsed ? 'menu__item--collapsed',*/
/*           item.in_active_trail ? 'menu__item--active-trail',*/
/*           'menu__item-title--' ~ item.title|render|clean_class*/
/*         ]*/
/*       %}*/
/* */
/*       {# We set an id on list items to provide context for aria attributes in responsive menu toggle buttons. #}*/
/*       <li{{ item.attributes.addClass(item_classes).setAttribute('id', 'mlid-' ~ item.title|render|clean_class)|without('role') }}>*/
/* */
/*         <span class="menu__link--wrapper{{ is_parent ? ' is-parent__wrapper' }}">*/
/*           {{*/
/*             link(*/
/*               item.title,*/
/*               item.url,*/
/*               item.attributes.removeClass(item_classes).addClass('menu__link')|without('id', 'role')*/
/*             )*/
/*           }}*/
/*         </span>*/
/* */
/*         {% if item.below %}*/
/*           {{ menus.menu_links(item.below, attributes, menu_level + 1, menu_name) }}*/
/*         {% endif %}*/
/* */
/*       </li>*/
/* */
/*     {%- endfor -%}*/
/* */
/*     </ul>*/
/*   {% endif %}*/
/* {%- endmacro -%}*/
/* */
