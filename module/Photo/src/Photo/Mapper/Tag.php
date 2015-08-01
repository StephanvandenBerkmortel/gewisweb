<?php

namespace Photo\Mapper;

use Doctrine\ORM\EntityManager;

/**
 * Mappers for Tags.
 *
 */
class Tag
{

    /**
     * Doctrine entity manager.
     *
     * @var EntityManager
     */
    protected $em;

    /**
     * Constructor
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Retrieves a tag by id from the database.
     *
     * @param integer $id the id of the tag
     *
     * @return \Photo\Model\Tag
     */
    public function getTagById($tagId)
    {
        return $this->getRepository()->find($tagId);
    }

    public function findTag($photoId, $lidnr)
    {
        return $this->getRepository()->findOneBy(array(
            'photo' => $photoId,
            'member' => $lidnr
        ));
    }

    /**
     * Removes a tag.
     *
     * @param $tag
     */
    public function remove($tag)
    {
        $this->em->remove($tag);
    }


    /**
     * Flush.
     */
    public function flush()
    {
        $this->em->flush();
    }

    /**
     * Get the repository for this mapper.
     *
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository()
    {
        return $this->em->getRepository('Photo\Model\Tag');
    }

}