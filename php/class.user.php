<?php

class USER
{
    public function returnJSON($type, $data, $params = null)
    {
        $array = [];
        $array['type'] = $type;
        $array['data'] = $data;
        $array['params'] = $params;
        echo json_encode($array);
    }

    public function redirect($url)
    {
        header("Location: $url");
    }
}
