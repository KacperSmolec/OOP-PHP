<?php
 namespace Storage ;

 use Config\Directory;
 use Concept\Distinguishable;
 use Widget\Link;
 use Widget\Widget;

 class FileStorage implements Storage {

     public function store(Distinguishable $x) : void{
        $f = fopen(Directory::storage()."/".$x->key(),'w');
        if($f) {
            fwrite($f, serialize($x));
            fclose($f);
        }
     }

     /**
      * @return Distinguishable[]
      */
     public function loadAll() :array {
         $files = scandir(Directory::storage());

         $allWidgets = array();
         if(!$files) return $allWidgets ;

         for($i=0 ; $i< count($files);$i++){
             if(!str_starts_with($files[$i],"widget")){
                 continue;
             }
             //if (! $files[$i] instanceof Distinguishable )  ;

             $f = fopen(Directory::storage() . "/" . $files[$i],'r');
             if(!$f)  return $allWidgets ;
             $s = filesize(Directory::storage() . "/" . $files[$i]);
             if(!$s)  return $allWidgets ;
             $widgetName= fread($f,$s);
             fclose($f);
             if(!$widgetName) return $allWidgets ;

             if(unserialize($widgetName) instanceof Widget) {
                 $u = unserialize($widgetName);
                 array_push($allWidgets, $u);
             }
         }

         return $allWidgets;
     }

}