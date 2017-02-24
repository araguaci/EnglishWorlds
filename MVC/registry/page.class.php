<?php
  /**
   * Page object
   * @author Salim Djerbouh
   * @version 0.1
   */
  class ClassName extends AnotherClass
  {
    // page title
    private $title = '';
    // template tags
    private $tags = array();
    // tags which should be processed after the page has been parsed
    // reason: what if there are teplate tags within the database content, we must parse the page, then parse it again for post parse tags
    private $postParseTags = array();
    // template bits
    private $bits = array();
    // the page content
    private $content = "";
    private $apd = array();
    /**
     * Create our page object
     */
     function __construct(Registry $registry)
     {
       $this->registry = $registry;
     }

     /**
      * Get the page title from the page
      * @return String
      */
      public function getTitle()
      {
        return $this->title;
      }
      /**
       * Set the page title
       * @param String $title the page title
       * @return void
       */
       public function setTitle($title)
       {
         $this->title = $title;
       }
       /**
        * Set the page content
        * @param String $content the page content
        * @return void
        */
        public function setContent($content)
        {
          $this->content = $content;
        }
       /**
        * Add a template tag, and its replacement value/data to the page
        * @param String $key the key to store within the tags array
        * @param String $data the replacement data (may also be an array)
        * @return void
        */
        public function addTag($key, $data)
        {
          $this->tags[$key] = $data;
        }
        public function removeTag($key)
        {
          unset($this->tags[$key]);
        }
        /**
         * Get tags associated with the page
         * @return void
         */
         public function getTags()
         {
           return $this->tags;
         }
         /**
          * Add post parse tags: as per adding tags
          * @param String $key the key to store within the array
          * @param String $data the replacement data
          * @return void
          */
          public function addPPTag($key, $data)
          {
            $this->postParseTags[$key] = $data;
          }
          /**
           * Get tags to be parsed after the first batch have been parsed
           * @return array
           */
           public function getPPTags()
           {
             return $this->postParseTags;
           }
           
  }

 ?>
