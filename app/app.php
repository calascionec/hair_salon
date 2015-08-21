<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";
    require_once __DIR__."/../src/Client.php";

    $app = new Silex\Application();

    $app['debug'] = true;

    $server = 'mysql:host=localhost;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    //Root route
    $app->get('/', function() use ($app) {
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    //Add a stylist
    $app->post('/stylists', function() use ($app) {
        if (!empty($_POST['name'])) {
            $stylist = new Stylist(preg_quote($_POST['name'], "'"));
            $stylist->save();
        }
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    //Delete all stylists
    $app->post('/delete_stylists', function() use ($app) {
        Stylist::deleteAll();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    //Take you to update page for a stylist
    $app->get('/stylists/{id}/edit', function($id) use ($app) {
        $stylist = Stylist::find($id);
        return $app['twig']->render("edit_stylist.html.twig", array('stylist' => $stylist));
    });

    //Updates the name of the stylist and returns to the root route
    $app->patch("/stylists/{id}", function($id) use ($app) {
        if ( !empty($_POST['name'])) {
            $name = $_POST['name'];
            $stylist = Stylist::find($id);
            $stylist->update($name);
        }
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    //Deletes individual stylist
    $app->delete("/stylists/{id}/delete", function($id) use ($app) {
        $stylist = Stylist::find($id);
        $stylist->delete();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    //Display one stylist and their clients
    $app->get("/stylists/{id}", function($id) use ($app) {
        $stylist = Stylist::find($id);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });

    //Add a client to a stylist's page
    $app->post('/client', function() use ($app) {
        $name = preg_quote($_POST['name'], "'");
        $phone_number = preg_quote($_POST['phone_number'], "'");
        $date_added = preg_quote($_POST['date_added'], "'");
        $stylist_id = preg_quote($_POST['stylist_id'], "'");
        $client = new Client($name, $phone_number, $date_added, $stylist_id);
        $client->save();
        $stylist = Stylist::find($stylist_id);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });

    //Delete all clients
    $app->post('/delete_clients', function() use ($app) {
        Client::deleteAll();
        $stylist = Stylist::find($_POST['stylist_id']);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });

    //Display update page for a client
    $app->get('/client/{id}/edit', function($id) use ($app) {
        $client = Client::find($id);
        $stylist_id = $client->getStylistId();
        return $app['twig']->render('edit_client.html.twig', array('client' => $client, 'stylist' => $stylist_id));
    });

    //Delete single restaurant
    $app->delete("/client/{id}/delete", function($id) use ($app) {
        $client = Client::find($id);
        $client->delete();
        $stylist = Stylist::find($_POST['stylist_id']);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));

    });

    return $app;

 ?>
