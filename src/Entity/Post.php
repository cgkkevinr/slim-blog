<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="post_id_seq")
     * @ORM\Column(type="integer", options={"default"="nextval('post_id_seq'::regclass)"})
     */
    private $id;
    /**
     * @ORM\Column()
     */
    private $title;
    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}