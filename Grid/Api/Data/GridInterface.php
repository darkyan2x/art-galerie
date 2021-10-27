<?php
/**
 * ArtGalerie_Grid Grid Interface.
 *
 * @category    ArtGalerie
 *
 * @author      ArtGalerie Software Private Limited
 */
namespace ArtGalerie\Grid\Api\Data;
 
interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const FRAME_ID = 'frame_id';
    const FRAME_NAME = 'frame_name';
    const MATERIAL_TYPE = 'material_type';
    const THICKNESS = 'thickness';
    const WEIGHT = 'weight';
    const FRAME_IMAGE = 'frame_image';
    const FRAME_EDGE = 'frame_edge';
    const PRICE = 'price';
    const PUBLISH_DATE = 'publish_date';
    const IS_ACTIVE = 'is_active';
    const UPDATE_TIME = 'update_time';
    const CREATED_AT = 'created_at';
    const STYLE_ID = 'style_id';
    const COLOR_ID = 'color_id';
    const WIDTH_ID = 'width_id';
    const CATEGORY_ID = 'category_id';
    const DESCRIPTION = 'description';
    const HIGHLIGHT = 'highlight';
 
    /**
     * Get FrameId.
     *
     * @return int
     */
    public function getFrameId();
 
    /**
     * Set FrameId.
     */
    public function setFrameId($frameId);

    /**
     * Get FrameName.
     *
     * @return varchar
     */
    public function getFrameName();
 
    /**
     * Set FrameName.
     */
    public function setFrameName($frameName);
 
    /**
     * Get Material Type.
     *
     * @return varchar
     */
    public function getMaterialType();
 
    /**
     * Set Material Type.
     */
    public function setMaterialType($material_type);
 
    /**
     * Get Thickness.
     *
     * @return varchar
     */
    public function getThickness();
 
    /**
     * Set Thickness.
     */
    public function setThickness($thickness);

    /**
     * Get Weight.
     *
     * @return varchar
     */
    public function getWeight();
 
    /**
     * Set Weight.
     */
    public function setWeight($weight);
    
    /**
     * Get Frame Image.
     *
     * @return varchar
     */
    public function getFrameImage();
 
    /**
     * Set Content.
     */
    public function setFrameImage($frame_image);

    /**
     * Get FrameEdge.
     *
     * @return varchar
     */
    public function getFrameEdge();
 
    /**
     * Set FrameEdge.
     */
    public function setFrameEdge($frameEdge);

    /**
     * Get Price.
     *
     * @return int
     */
    public function getPrice();
 
    /**
     * Set Price.
     */
    public function setPrice($price);
 
    /**
     * Get Publish Date.
     *
     * @return varchar
     */
    public function getPublishDate();
 
    /**
     * Set PublishDate.
     */
    public function setPublishDate($publishDate);
 
    /**
     * Get IsActive.
     *
     * @return varchar
     */
    public function getIsActive();
 
    /**
     * Set StartingPrice.
     */
    public function setIsActive($isActive);
 
    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime();
 
    /**
     * Set UpdateTime.
     */
    public function setUpdateTime($updateTime);
 
    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt();
 
    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt);

    /**
     * Get Style ID.
     *
     * @return int
     */
    public function getStyleId();
 
    /**
     * Set Style ID.
     */
    public function setStyleId($styleId);

    /**
     * Get Color ID.
     *
     * @return int
     */
    public function getColorId();
 
    /**
     * Set Color ID.
     */
    public function setColorId($colorId);

    /**
     * Get Width ID.
     *
     * @return int
     */
    public function getWidthId();
 
    /**
     * Set Width ID.
     */
    public function setWidthId($widthId);

    /**
     * Get Category ID.
     *
     * @return int
     */
    public function getCategoryId();
 
    /**
     * Set Category ID.
     */
    public function setCategoryId($categoryId);

    /**
     * Get Description.
     *
     * @return varchar
     */
    public function getDescription();
 
    /**
     * Set Description.
     */
    public function setDescription($description);

    /**
     * Get Highlight.
     *
     * @return boolean
     */
    public function getHighlight();
 
    /**
     * Set Highlight.
     */
    public function setHighlight($highlight);
}