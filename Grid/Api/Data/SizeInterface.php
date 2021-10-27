<?php
/**
 * ArtGalerie_Grid Grid Interface.
 *
 * @category    ArtGalerie
 *
 * @author      ArtGalerie Software Private Limited
 */
namespace ArtGalerie\Grid\Api\Data;
 
interface SizeInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ID = 'id';
    const NAME = 'name';
    const MIN_SIZE = 'min_size';
    const MAX_SIZE = 'max_size';
    const TIMESTAMPS = 'timestamps';
 
    /**
     * Get Id.
     *
     * @return int
     */
    public function getId();
 
    /**
     * Set Id.
     */
    public function setId($Id);

    /**
     * Get Name.
     *
     * @return int
     */
    public function getName();
 
    /**
     * Set Name.
     */
    public function setName($name);

    /**
     * Get Min Size.
     *
     * @return int
     */
    public function getMinSize();
 
    /**
     * Set Min Size.
     */
    public function setMinSize($minSize);

    /**
     * Get Max Size.
     *
     * @return int
     */
    public function getMaxSize();
 
    /**
     * Set Max Size.
     */
    public function setMaxSize($maxSize);

    /**
     * Get Timestamps.
     *
     * @return int
     */
    public function getTimestamps();
 
    /**
     * Set Timestamps.
     */
    public function setTimestamps($timestamps);
}