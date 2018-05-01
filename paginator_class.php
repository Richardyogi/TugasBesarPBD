<?php
    class Paginator{
        private $limit;
        private $_page;
        private $_query;
        private $_total=0;
        private $_start;
        private $_end;
        

        public function __construct( $conn, $query) {

            $this->_conn = $conn;
            $this->_query = $query;
         
            $rs= sqlsrv_query( $this->_conn,$this->_query);
            
        }

        public function getData( $limit, $page = 1 ,$start=0, $end) {

            $this->_limit   = $limit;
            $this->_page    = $page;
         
            if ( $this->_limit == $this->_total ) {
                $query      = $this->_query;
            } else {
                $query      = $this->_query . " where id>=" .$start."and id<=".$end;
            }
            $rs = sqlsrv_query( $this->_conn,$this->_query);
            
         
            while ( $row = sqlsrv_fetch_array( $rs, SQLSRV_FETCH_ASSOC)) {
                $results[]  = $row;
                $this->_total++;
            }
         
            $result         = new stdClass();
            $result->data   = $results;
            
          
            return $result;
        }

                public function createLinks($links, $list_class,$mulai, $berakhir ) {
              
                $this->_end= $berakhir;
                $this->_start= $mulai;
                
                $last       =  $this->_total/$this->_limit ;

                $html       = '<ul class="'. $list_class . '">';
             
                $class      = ( $this->_page == 1 ) ? "disabled" : "";
                $html       .= '<li class="page-item' . $class . '"><a class="page-link" href="?limit=' . $this->_limit . '&page=' . (($this->_page - 1)>0?$this->_page - 1:1)  . '&start=' . 
                                ( ($mulai-$this->_limit)>0?$mulai-$this->_limit:0 ) . '&end=' . (($berakhir-$this->_limit)>0?$berakhir-$this->_limit:50) .'">&laquo;</a></li>';
                
                if ( $mulai > 1 ) {
                    $html   .= '<li class=" page-item"><a class="page-link" href="?limit=' . $this->_limit . '&page=1&start=0&end=50">1</a></li>';
                    $html   .= '<li class=" page-item"><span>...</span></li>';
                }
                
                
                for ( $i = $this->_page-3; $i <= $this->_page+3; $i++ ) {
                    if($i>=1 && $i<=50000/$this->_limit){
                        $class  = ( $this->_page == $i ) ? " active" : "";
                        $html   .= '<li class="page-item' . $class . '"><a class="page-link" href="?limit=' . $this->_limit . '&page=' . $i  . '&start=' . ( $i*$this->_limit-$this->_limit) . '&end=' . ( $i*$this->_limit ) .'">' . $i . '</a></li>';
                    }
                }
             
                if ( $berakhir<$last*$this->_limit ) {
                    $html   .= '<li class="disabled page-item"><span>...</span></li>';
                    $html   .= '<li><a class="page-link" href="?limit=' . $this->_limit . '&page=' . $last . '&start=49994&end=50000">'.$last.'</a></li>';
                }
             
                $class      = ( $this->_page == $last ) ? "disabled" : "";
                $html       .= '<li class="page-item' . $class . '"><a class="page-link" href="?limit=' . $this->_limit . '&page=' . ( $this->_page + 1 )  . '&start=' . ($berakhir ) . '&end=' . ($berakhir+$this->_limit ) .'">&raquo;</a></li>';
             
                $html       .= '</ul>';
             
                return $html;
            }
    }
?>