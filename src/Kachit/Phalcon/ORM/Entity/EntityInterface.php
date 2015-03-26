<?php
/**
 * Class EntityInterface
 *
 * @package Kachit\Phalcon\ORM\Entity
 */
namespace Kachit\Phalcon\ORM\Entity;

interface EntityInterface {

    /**
     * Convert entity to array
     *
     * @return array
     */
    public function toArray();


    /**
     * Inserts or updates a model instance. Returning true on success or false otherwise.
     *
     * @param  array $data
     * @param  array $whiteList
     * @return boolean
     */
    public function save($data=null, $whiteList=null);


    /**
     * Inserts a model instance. If the instance already exists in the persistance it will throw an exception
     * Returning true on success or false otherwise.
     *
     * @param  array $data
     * @param  array $whiteList
     * @return boolean
     */
    public function create($data=null, $whiteList=null);


    /**
     * Updates a model instance. If the instance doesn't exist in the persistance it will throw an exception
     * Returning true on success or false otherwise.
     *
     * @param  array $data
     * @param  array $whiteList
     * @return boolean
     */
    public function update($data=null, $whiteList=null);


    /**
     * Deletes a model instance. Returning true on success or false otherwise.
     *
     * @return boolean
     */
    public function delete();

    /**
     * Get primary key
     *
     * @return mixed
     */
    public function getPrimaryKey();
}