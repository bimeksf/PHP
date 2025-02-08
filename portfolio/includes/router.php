<?php

declare(strict_types=1);

const ALLOWED_METHODS = ["GET", "POST"];
const INDEX_URI = '';
const INDEX_ROUTE = "index";


function normalizeUri($uri): string
{
  $uri = strtolower(trim($uri, "/"));
  return $uri === INDEX_URI ? INDEX_ROUTE : $uri;
}


function getFilePath($uri, $method)
{

  return ROUTES_DIR . "/" .  normalizeUri($uri) . "_" . strtolower($method) . ".php";
}


function notFound()
{
  http_response_code(404);
  echo "404 not found";
  exit;
}
function badRequest($message = "bad reqyest")
{
  http_response_code(400);
  echo $message;
  exit;
}



function dispatch(string $uri, string $method): void
{
  $uri = normalizeUri($uri);

  $method = strtoupper($method);
  if (!in_array($method, ALLOWED_METHODS)) {

    notFound();
  }

  $filePath = getFilePath($uri, $method);

  if (file_exists($filePath)) {
    include($filePath);
    return;
  }
}
