<?php
use Widget\Widget;
use Widget\Button;
use Widget\Link;
use Storage\FileStorage;

class App
{
    private function render(Widget $widget) : void{
        $widget->draw();
    }

    public function run(): void {

        $storage = new FileStorage();
        $widget_1 = new Link(1);
        $widget_2 = new Link(2);
        $widget_3 = new Link(3);
        $widget_4 = new Button(1);
        $widget_5 = new Button(2);
        $widget_6 = new Button(3);
        // save to file
        $storage->store($widget_1);
        $storage->store($widget_2);
        $storage->store($widget_3);
        $storage->store($widget_4);
        $storage->store($widget_5);
        $storage->store($widget_6);

        // read from file
        $loaded = $storage->loadAll();

        foreach ($loaded as  $widget ){
            if($widget instanceof Widget) {
                $this->render($widget);
            }
        }

    }


}

