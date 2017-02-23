<?php
    /**
     * Template management
     * @author Salim Djerbouh
     * @version 0.1
     */
    class template {
      /**
       * Include our page class, and build a page object to manage the content and structure of the page
       * @param Object our registry object
       */
       public function __construct(Registry $registry)
       {
         $this->registry = $registry;
         include(FRAMEWORK_PATH . '/registry/page.class.php');
         $this->page = new Page($this->registry);
       }
      /**
       * Set the content of the page based on a number of templates
       * pass template file locations as individual arguments
       * @return void
       */
       public function buildFromTemplate()
       {
         $bits = func_get_args();
         $content = "";
         foreach ($bits as $bit) {
           if (strpos($bit, 'views/') === false) {
             $bit = 'views/' . $this->registry->getSetting('view') . '/templates/' . $bit;
           }
           if (file_exists($bit) == true) {
             $content .= file_get_contents($bit);
           }
         }
         $this->page->setContent($content);
       }
      /**
       * Add a template bit from a view to our page
       * @param String $tag the tag where we insert the template e.g.{hello}
       * @param String $bit the template bit (path to file, or just the filename)
       * @return void
       */
       public function addTemplateBit($tag, $bit)
       {
         if (strpos($bit, 'views/') === false) {
           $bit = 'views/' . $this->registry->getSetting('view') . '/templates/' . $bit;
         }
         $this->page->addTemplateBit($tag, $bit);
       }
    }
 ?>
