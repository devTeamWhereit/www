<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-09-26
 * Time: 오전 7:23
 */
class Ranking extends CB_Controller
{

    /**
     * 모델을 로딩합니다
     */
    protected $models = array('Board','Search_keyword');

    /**
     * 이 컨트롤러의 메인 모델 이름입니다
     */
    protected $modelname = 'Search_keyword_model';
    /**
     * 헬퍼를 로딩합니다
     */
    protected $helpers = array('form', 'array');

    function __construct()
    {
        parent::__construct();

        /**
         * 라이브러리를 로딩합니다
         */
        $this->load->library(array('querystring'));
    }


    /**
     * 전체 메인 페이지입니다
     */
    public function index()
    {
        // 이벤트 라이브러리를 로딩합니다
        $eventname = 'event_ranking_index';
        $this->load->event($eventname);

        $view = array();
        $view['view'] = array();

        // 이벤트가 존재하면 실행합니다
        $view['view']['event']['before'] = Events::trigger('before', $eventname);

        $where = array(
            'brd_search' => 1,
        );
        $board_id = $this->Board_model->get_board_list($where);
        $board_list = array();
        if ($board_id && is_array($board_id)) {
            foreach ($board_id as $key => $val) {
                $board_list[] = $this->board->item_all(element('brd_id', $val));
            }
        }
        $view['view']['board_list'] = $board_list;
        $view['view']['canonical'] = site_url();



        /**
         * 페이지에 숫자가 아닌 문자가 입력되거나 1보다 작은 숫자가 입력되면 에러 페이지를 보여줍니다.
         */
        $param =& $this->querystring;
        $page = (((int) $this->input->get('page')) > 0) ? ((int) $this->input->get('page')) : 1;
        $view['view']['sort'] = array(
            'sek_id' => $param->sort('sek_id', 'asc'),
            'sek_keyword' => $param->sort('sek_keyword', 'asc'),
            'sek_datetime' => $param->sort('sek_datetime', 'asc'),
            'sek_ip' => $param->sort('sek_ip', 'asc'),
        );

        $findex = $this->input->get('findex') ? $this->input->get('findex') : $this->Search_keyword_model->primary_key;
        $forder = $this->input->get('forder', null, 'desc');
        $sfield = $this->input->get('sfield', null, '');
        $skeyword = $this->input->get('skeyword', null, '');

        $per_page = admin_listnum();
        $offset = ($page - 1) * $per_page;

        /**
         * 인기검색어 목록에 필요한 정보를 가져옵니다.
         */
        $this->Search_keyword_model->allow_search_field = array('sek_id', 'sek_keyword', 'sek_datetime', 'sek_ip', 'search_keyword.mem_id'); // 검색이 가능한 필드
        $this->Search_keyword_model->search_field_equal = array('sek_id', 'search_keyword.mem_id'); // 검색중 like 가 아닌 = 검색을 하는 필드
        $this->Search_keyword_model->allow_order_field = array('sek_id', 'sek_keyword', 'sek_datetime', 'sek_ip'); // 정렬이 가능한 필드
        $result = $this->Search_keyword_model->get_admin_list($per_page, $offset, '', '', $findex, $forder, $sfield, $skeyword);
        $view['view']['fch_data'] = $result;

//       인기검색어 끝


        // 이벤트가 존재하면 실행합니다
        $view['view']['event']['before_layout'] = Events::trigger('before_layout', $eventname);

        /**
         * 레이아웃을 정의합니다
         */
        $page_title = $this->cbconfig->item('site_meta_title_ranking');
        $meta_description = $this->cbconfig->item('site_meta_description_ranking');
        $meta_keywords = $this->cbconfig->item('site_meta_keywords_ranking');
        $meta_author = $this->cbconfig->item('site_meta_author_ranking');
        $page_name = $this->cbconfig->item('site_page_name_ranking');

        $layoutconfig = array(
            'path' => 'ranking',
            'layout' => 'layout',
            'skin' => 'ranking',
            'layout_dir' => $this->cbconfig->item('layout_ranking'),
            'mobile_layout_dir' => $this->cbconfig->item('mobile_layout_ranking'),
            'use_sidebar' => $this->cbconfig->item('sidebar_ranking'),
            'use_mobile_sidebar' => $this->cbconfig->item('mobile_sidebar_ranking'),
            'skin_dir' => $this->cbconfig->item('skin_ranking'),
            'mobile_skin_dir' => $this->cbconfig->item('mobile_skin_ranking'),
            'page_title' => $page_title,
            'meta_description' => $meta_description,
            'meta_keywords' => $meta_keywords,
            'meta_author' => $meta_author,
            'page_name' => $page_name,
        );
        $view['layout'] = $this->managelayout->front($layoutconfig, $this->cbconfig->get_device_view_type());
        $this->data = $view;
        $this->layout = element('layout_skin_file', element('layout', $view));
        $this->view = element('view_skin_file', element('layout', $view));
    }
}