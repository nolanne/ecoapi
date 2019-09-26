<?php 
class validurl{
    
    private $datas_url;
    
    private function check_url()
    {
        if( isset( $_GET['request'] ) )
        {
            $this->datas_url = $_GET['request'];
            
            return true;
        }
        else
        {
            echo 'Wrong url format !';
            return false;
        }
    }
    
    
    private function check_key_api()
    {
        if( isset( $_GET['apikey'] ) )
        {
            if( $_GET['apikey'] === '123456' )
            {
                return true;
            }
        }
        
        echo 'Not allowed ! You have no key !';
        return false;
    }
    
    
    
    public function get_url_datas()
    {
        if( $this->check_url() && $this->check_key_api() )
        {
            return $this->datas_url;
        }
        
        return false;
    }
    
    
}