<?php


class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();


        // ini controller
        // notice
        //         halo, bagi teman-teman yang mengalami error Notice: Trying to access array offset on value of type null di if(file_exists('../app/controllers/'. $url[0] . '.php'))
        // 		{
        // 			$this->controller = $url[0];
        // 			unset($url[0]);
        // 		}
        // Dikarenakan $url[0] nilainya NULL sehingga tidak bisa dibandingkan/dicari ke filenya alias error (mungkin versi lama bisa, tapi versi baru akan error)

        // Solusinya cek $url[0] kalau Null, jadikan nilai default $url[0] = 'Home':
        // if($url == NULL)
        //                {
        // 			$url = [$this->controller];
        // 		}

        // Versi lengkap:
        // if($url == NULL)
        //                {
        // 			$url = [$this->controller];
        // 		}
        // if(file_exists('../app/controllers/'. $url[0] . '.php'))
        // 		{
        // 			$this->controller = $url[0];
        // 			unset($url[0]);
        // 		}
        // akahir notice


        if ($url == NULL) {
            $url = [$this->controller];
        }
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params

        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan controller & method ,serta kirimkan params

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
