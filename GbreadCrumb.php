<?php

/**
 * Permite la creación y modficación de un breadcrumb
 * 
 * @package breadcrumb
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * @link 
 * @author David Garzon <stylegeco@gmail.com>
 */
class GBreadCrumb {

    /**
     * Array de labels y links de un breadcrumb.
     * @var array 
     */
    private $breadcrumb = array();

    /**
     * Clase CSS del contenedor del bradcrumb.
     * @var string 
     */
    public $class;

    /**
     * Etiqueta html contenedora del bradcrumb
     * @var string
     */
    public $contenedor;

    /**
     * 
     * @param string $class Clase CSS del contenedor del bradcrumb.
     * @param string $contenedor Etiqueta html contenedora del bradcrumb
     */
    public function __construct($class = "breadcrumb", $contenedor = 'ul') {
        $this->class = $class;
        $this->contenedor = $contenedor;
    }

    /**
     * Agrega un nuevo link al breadcrumb
     * @param string $label texto del link
     * @param string $link url del link
     */
    public function push($label, $link) {
        if (!empty($link) && !empty($link)) {
            $this->breadcrumb[] = [
                "link" => $link,
                "label" => $label,
            ];
        }
    }

    /**
     * Imprime un bradcrumb recibe un bracket para separar los link 
     * si recibe $link=true imprime los link de lo contrario solo imprime los label
     * @param string $bracket separador de los link
     * @param boolean $link si es igual a TRUE imprime links
     * @return string breadcrumb
     */
    public function printBreadCrumb($bracket = "»", $link = false) {
        $total = count($this->breadcrumb);
        $salida = "<" . $this->contenedor . " class='" . $this->class . "' >";
        if ($total == 1) {
            return $salida .= "<li>" . $this->breadcrumb[0]['label'] . "</li></ol>";
        }
        foreach ($this->breadcrumb as $key => $items) {
            if ($key == $total - 1)
                return $salida .= "<li class='active' >" . $items['label'] . "</li>";
            if ($link)
                $salida .= "<li><a href='$items[link]' >" . $items['label'] . "</a></li> $bracket ";
            else
                $salida .= "<li>" . $items['label'] . "</li> $bracket ";
        }
        return $salida . "</" . $this->contenedor . ">";
    }

    /**
     * Retorna un array con el contenido del bradcrumb
     * @return array
     */
    public function getBreadCrumb() {
        return $this->breadcrumb;
    }

    /**
     * Elimina todos los elementos del breadcrumb
     */
    public function reset() {
        $this->breadcrumb = array();
    }

}
