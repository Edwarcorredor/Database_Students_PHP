<?php

    require "../vendor/autoload.php";
    $router = new \Bramus\Router\Router();
    $dotenv = Dotenv\Dotenv::createImmutable("../")->load();
    

    $router->get("/academic_area/{id}", function($id){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM academic_area WHERE id = :ID");
        $res->bindParam("ID", $id);
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->get("/academic_area", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM academic_area");
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->put("/academic_area", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE academic_area SET id_area = :ID_AREA, id_journeys = :ID_JOURNEYS, id_position = :ID_POSITION, id_staff = :ID_STAFF WHERE id = :ID");
        $res->bindParam("ID", $_DATA['id']);
        $res->bindParam("ID_AREA", $_DATA['id_area']);
        $res->bindParam("ID_JOURNEYS", $_DATA['id_journeys']);
        $res->bindParam("ID_POSITION", $_DATA['id_position']);
        $res->bindParam("ID_STAFF", $_DATA['id_staff']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/academic_area", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO academic_area (id,id_area,id_staff,id_position,id_journeys) VALUES (:ID,:ID_AREA,:ID_STAFF,:ID_POSITION,:ID_JOURNEYS)");
        $res->bindParam("ID", $_DATA['id']);
        $res->bindParam("ID_AREA", $_DATA['id_area']);
        $res->bindParam("ID_STAFF", $_DATA['id_staff']);
        $res->bindParam("ID_POSITION", $_DATA['id_position']);
        $res->bindParam("ID_JOURNEYS", $_DATA['id_journeys']);
        $res->execute();
        $res = $res->rowCount();
        echo "hola";
        echo json_encode($res);
    });

    $router->delete("/academic_area", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM academic_area WHERE id = :ID");
        $res->bindParam("ID", $_DATA['id']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->get("/admin_area/{id}", function($id){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM admin_area WHERE id = :ID");
        $res->bindParam("ID", $id);
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->get("/admin_area", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM admin_area");
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->put("/admin_area", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE admin_area SET id_area = :ID_AREA, id_journey = :ID_JOURNEY, id_position = :ID_POSITION, id_staff = :ID_STAFF WHERE id = :ID");
        $res->bindParam("ID", $_DATA['id']);
        $res->bindParam("ID_AREA", $_DATA['id_area']);
        $res->bindParam("ID_JOURNEY", $_DATA['id_journey']);
        $res->bindParam("ID_POSITION", $_DATA['id_position']);
        $res->bindParam("ID_STAFF", $_DATA['id_staff']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/admin_area", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO admin_area (id,id_area,id_staff,id_position,id_journey) VALUES (:ID,:ID_AREA,:ID_STAFF,:ID_POSITION,:ID_JOURNEY)");
        $res->bindParam("ID", $_DATA['id']);
        $res->bindParam("ID_AREA", $_DATA['id_area']);
        $res->bindParam("ID_STAFF", $_DATA['id_staff']);
        $res->bindParam("ID_POSITION", $_DATA['id_position']);
        $res->bindParam("ID_JOURNEY", $_DATA['id_journey']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->delete("/admin_area", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM admin_area WHERE id = :ID");
        $res->bindParam("ID", $_DATA['id']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });


    $router->get("/areas/{id}", function($id){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM areas WHERE id = :ID");
        $res->bindParam("ID", $id);
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->get("/areas", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM areas");
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->put("/areas", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE areas SET name_area = :NAME_AREA WHERE id = :ID");
        $res->bindParam("ID", $_DATA['id']);
        $res->bindParam("NAME_AREA", $_DATA['name_area']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/areas", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO areas (id,name_area) VALUES (:ID,:NAME_AREA)");
        $res->bindParam("ID", $_DATA['id']);
        $res->bindParam("NAME_AREA", $_DATA['name_area']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->delete("/areas", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM areas WHERE id = :ID");
        $res->bindParam("ID", $_DATA['id']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->get("/campers/{id}", function($id){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM campers WHERE id = :ID");
        $res->bindParam("ID", $id);
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->get("/campers", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM campers");
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->put("/campers", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE campers SET id_team_schedule = :ID_TEAM_SCHEDULE, id_route = :ID_ROUTE, id_trainer = :ID_TRAINER, id_psycologist = :ID_PSYCOLOGIST, id_teacher = :ID_TEACHER, id_level = :ID_LEVEL, id_journey = :ID_JOURNEY, id_staff = :ID_STAFF WHERE id = :ID");
        $res->bindParam("ID", $_DATA['id']);
        $res->bindParam("ID_TEAM_SCHEDULE", $_DATA['id_team_schedule']);
        $res->bindParam("ID_ROUTE", $_DATA['id_route']);
        $res->bindParam("ID_TRAINER", $_DATA['id_trainer']);
        $res->bindParam("ID_PSYCOLOGIST", $_DATA['id_psycologist']);
        $res->bindParam("ID_TEACHER", $_DATA['id_teacher']);
        $res->bindParam("ID_LEVEL", $_DATA['id_level']);
        $res->bindParam("ID_JOURNEY", $_DATA['id_journey']);
        $res->bindParam("ID_STAFF", $_DATA['id_staff']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/campers", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO campers (id,id_team_schedule,id_route,id_trainer,id_psycologist, id_teacher, id_level, id_journey, id_staff) VALUES (:ID,:ID_TEAM_SCHEDULE,:ID_ROUTE,:ID_TRAINER,:ID_PSYCOLOGIST,:ID_TEACHER,:ID_LEVEL,:ID_JOURNEY,:ID_STAFF)");
        $res->bindParam("ID", $_DATA['id']);
        $res->bindParam("ID_TEAM_SCHEDULE", $_DATA['id_team_schedule']);
        $res->bindParam("ID_ROUTE", $_DATA['id_route']);
        $res->bindParam("ID_TRAINER", $_DATA['id_trainer']);
        $res->bindParam("ID_PSYCOLOGIST", $_DATA['id_psycologist']);
        $res->bindParam("ID_TEACHER", $_DATA['id_teacher']);
        $res->bindParam("ID_LEVEL", $_DATA['id_level']);
        $res->bindParam("ID_JOURNEY", $_DATA['id_journey']);
        $res->bindParam("ID_STAFF", $_DATA['id_staff']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->delete("/campers", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM campers WHERE id = :ID");
        $res->bindParam("ID", $_DATA['id']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->get("/levels/{id}", function($id){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM levels WHERE id = :ID");
        $res->bindParam("ID", $id);
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->get("/levels", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM levels");
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->put("/levels", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE levels SET name_level = :NAME_LEVEL, group_level = :GROUP_LEVEL WHERE id = :ID");
        $res->bindParam("ID", $_DATA['id']);
        $res->bindParam("NAME_LEVEL", $_DATA['name_level']);
        $res->bindParam("GROUP_LEVEL", $_DATA['group_level']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/levels", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO levels (id,name_level, group_level) VALUES (:ID,:NAME_LEVEL,:GROUP_LEVEL)");
        $res->bindParam("ID", $_DATA['id']);
        $res->bindParam("NAME_LEVEL", $_DATA['name_level']);
        $res->bindParam("GROUP_LEVEL", $_DATA['group_level']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->delete("/levels", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM levels WHERE id = :ID");
        $res->bindParam("ID", $_DATA['id']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->get("/cities/{id}", function($id){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM cities WHERE id = :ID");
        $res->bindParam("ID", $id);
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->get("/cities", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM cities");
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->put("/cities", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE cities SET name_city = :NAME_CITY, id_region = :ID_REGION WHERE id = :ID" );
        $res->bindParam("ID", $_DATA['id']);
        $res->bindParam("NAME_CITY", $_DATA['name_city']);
        $res->bindParam("ID_REGION", $_DATA['id_region']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/cities", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO cities (id,name_city, id_region) VALUES (:ID,:NAME_CITY,:ID_REGION)");
        $res->bindParam("ID", $_DATA['id']);
        $res->bindParam("NAME_CITY", $_DATA['name_city']);
        $res->bindParam("ID_REGION", $_DATA['id_region']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->delete("/cities", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM cities WHERE id = :ID");
        $res->bindParam("ID", $_DATA['id']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->get("/countries/{id}", function($id){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM countries WHERE id = :ID");
        $res->bindParam("ID", $id);
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->get("/countries", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM countries");
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->put("/countries", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE countries SET name_country = :NAME_COUNTRY WHERE id = :ID");
        $res->bindParam("ID", $_DATA['id']);
        $res->bindParam("NAME_COUNTRY", $_DATA['name_country']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/countries", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO countries (id,name_country) VALUES (:ID,:NAME_COUNTRY)");
        $res->bindParam("ID", $_DATA['id']);
        $res->bindParam("NAME_COUNTRY", $_DATA['name_country']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->delete("/countries", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM countries WHERE id = :ID");
        $res->bindParam("ID", $_DATA['id']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->get("/contact_info/{id}", function($id){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM contact_info WHERE id = :ID");
        $res->bindParam("ID", $id);
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->get("/contact_info", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM contact_info");
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->put("/contact_info", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE contact_info SET id_staff = :ID_STAFF, whatsapp = :WHATSAPP, instagram = :INSTAGRAM, linkedin = :LINKEDIN, email = :EMAIL, address = :ADDRESS, cel_number = :CELL_NUMBER WHERE id = :ID");
        $res->bindParam("ID", $_DATA['id']);
        $res->bindParam("ID_STAFF", $_DATA['id_staff']);
        $res->bindParam("WHATSAPP", $_DATA['whatsapp']);
        $res->bindParam("INSTAGRAM", $_DATA['instagram']);
        $res->bindParam("LINKEDIN", $_DATA['linkedin']);
        $res->bindParam("EMAIL", $_DATA['email']);
        $res->bindParam("ADDRESS", $_DATA['address']);
        $res->bindParam("CELL_NUMBER", $_DATA['cel_number']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/contact_info", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO contact_info (id,id_staff,whatsapp,instagram,linkedin,email,address,cel_number) VALUES (:ID,:ID_STAFF,:WHATSAPP,:INSTAGRAM,:LINKEDIN,:EMAIL,:ADDRESS,:CELL_NUMBER)");
        $res->bindParam("ID", $_DATA['id']);
        $res->bindParam("ID_STAFF", $_DATA['id_staff']);
        $res->bindParam("WHATSAPP", $_DATA['whatsapp']);
        $res->bindParam("INSTAGRAM", $_DATA['instagram']);
        $res->bindParam("LINKEDIN", $_DATA['linkedin']);
        $res->bindParam("EMAIL", $_DATA['email']);
        $res->bindParam("ADDRESS", $_DATA['address']);
        $res->bindParam("CELL_NUMBER", $_DATA['cel_number']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->delete("/contact_info", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM contact_info WHERE id = :ID");
        $res->bindParam("ID", $_DATA['id']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    

    $router->get("/journey/{id}", function($id){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM journey");
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->get("/journey", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM journey");
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });


    $router->put("/journey", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE journey SET name_journey = :NAME_JOURNEY, check_in = :CHECK_IN, check_out = :CHECK_OUT WHERE id = :ID");
        $res->bindParam("ID", $_DATA['id']);
        $res->bindParam("NAME_JOURNEY", $_DATA['name_journey']);
        $res->bindParam("CHECK_IN", $_DATA['check_in']);
        $res->bindParam("CHECK_OUT", $_DATA['check_out']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/journey", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO journey (id, name_journey, check_in, check_out) VALUES (:id, :name_journey, :check_in, :check_out)");
        $res->bindParam(":id", $_DATA['id']);
        $res->bindParam(":name_journey", $_DATA['name_journey']);
        $formcheck_in = DateTime::createFromFormat('H:i:s', $_DATA['check_in'])->format('H:i:s');
        $formcheck_out = DateTime::createFromFormat('H:i:s', $_DATA['check_out'])->format('H:i:s');
        $res->bindParam(":check_in", $formcheck_in);
        $res->bindParam(":check_out", $formcheck_out);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });
    
    $router->delete("/journey", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM journey WHERE id = :ID");
        $res->bindParam("ID", $_DATA['id']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });


    $router->get("/locations/{id}", function($id){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM locations WHERE id = :ID");
        $res->bindParam("ID", $id);
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->get("/locations", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM locations");
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->put("/locations", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE locations SET name_location = :NAME_LOCATION WHERE id = :ID");
        $res->bindParam("ID", $_DATA['id']);
        $res->bindParam("NAME_LOCATION", $_DATA['name_location']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/locations", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO locations (id,name_location) VALUES (:ID,:NAME_LOCATION)");
        $res->bindParam("ID", $_DATA['id']);
        $res->bindParam("NAME_LOCATION", $_DATA['name_location']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->delete("/locations", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM locations WHERE id = :ID");
        $res->bindParam("ID", $_DATA['id']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });


    $router->run();

?>