<?php

    class Views{
        public function getView($controller, $view, $data = "")
        {
            $view = ucwords($view);
            $controller = get_class($controller);

            if ($controller == "Index") {
                $view = 'Views/'.$view.'.php';
            }else{
                $view = 'Views/'.$controller.'/'.$view.'.php';
            }

            require_once $view;
        }
    }

?>