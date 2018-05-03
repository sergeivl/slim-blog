<?php namespace App\Services;

use JasonGrimes\Paginator;

class PaginationService extends Paginator
{
    /**
     * Render an HTML pagination control.
     *
     * @return string
     */
    public function toHtml()
    {
        if ($this->numPages <= 1) {
            return '';
        }

        $this->previousText = 'Предыдушая';
        $this->nextText = 'Следующая';

        $html = '<ul class="pagination">';
        if ($this->getPrevUrl()) {
            $html .= '<li class="page-item"><a href="' . $this->getPrevUrl() . '"  class="page-link">&laquo; '. $this->previousText .'</a></li>';
        }

        foreach ($this->getPages() as $page) {
            if ($page['url']) {
                $html .= '<li' . ($page['isCurrent'] ? ' class="page-item active"' : ' class="page-item"') . '><a href="' . $page['url'] . '" class="page-link">' . $page['num'] . '</a></li>';
            } else {
                $html .= '<li class="page-item disabled"><span class="page-link">' . $page['num'] . '</span></li>';
            }
        }

        if ($this->getNextUrl()) {
            $html .= '<li class="page-item"><a href="' . $this->getNextUrl() . '" class="page-link">'. $this->nextText .' &raquo;</a></li>';
        }
        $html .= '</ul>';

        $html = str_replace('/1"', '"', $html);
        $html = str_replace('""', '"/"', $html);

        return $html;
    }


}