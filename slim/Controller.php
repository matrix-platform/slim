<?php //>

namespace matrix\slim;

use Slim\Http\Stream;

class Controller {

    public function __invoke($request, $response, $args) {
        define('PATH_INFO', rtrim($args['path'], '/'));

        $result = require MATRIX . 'app.php';

        $status = $result->status();

        if ($status) {
            $response = $response->withStatus($status);
        }

        $headers = $result->headers();

        if ($headers) {
            foreach ($headers as $name => $value) {
                $response = $response->withHeader($name, $value);
            }
        }

        $content = $result->content();

        if (strlen($content)) {
            $response->getBody()->write($content);

            return $response;
        }

        $data = $result->json();

        if ($data !== null) {
            $response->getBody()->write(json_encode($data));

            return $response->withHeader('Content-Type', 'application/json');
        }

        $path = $result->file();

        if ($path) {
            $file = fopen($path, 'rb');
            $stream = new Stream($file);

            return $response->withBody($stream);
        }

        $location = $result->redirect();

        if ($location) {
            return $response->withHeader('Location', $location)->withStatus(302);
        }

        return $response;
    }

}
