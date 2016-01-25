<?php

namespace NTPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class ParagonUpload {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    public $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    /**
     * @Assert\File(maxSize="6000000")
     */
    public $file;

    /**
     * @ORM\Column(name="uploaded_at", type="datetime")
     *
     * @var \DateTime
     */
    public $uploadedAt;

    /**
     * @var date $planDate
     *
     * @ORM\Column(name="planDate", type="date", nullable=true)
     */
    public $planDate;

    public function getUploadedAt() {

        return $this->uploadedAt;
    }

    /**
     * Set uploadedAt
     *
     * @param \DateTime $uploadedAt
     * @ORM\PrePersist
     * @return ParagonUpload
     */
    public function setUploadedAt() {

        if (!$this->uploadedAt) {
            $this->uploadedAt = new \DateTime();
        }
    }

    public function getAbsolutePath() {
        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getWebPath() {
        return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
    }

    public function getUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        //return __DIR__ . '/' . $this->getUploadDir();
        return 'C:\wamp\www\data' . $this->getUploadDir() ;
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return '\uploads';
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null) {
        $this->file = $file;
        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload() {
        if (null !== $this->getFile()) {
            $filename = $this->getFile()->getClientOriginalName();
            $this->path = $filename; // . '.' . $this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload() {
        if (null === $this->getFile()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir() . '/' . $this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload() {
        $file = $this->getAbsolutePath();
        if ($file) {
            unlink($file);
        }
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile() {
        return $this->file;
    }

    /**
     * Set planDate
     *
     * @param date $planDate
     */
    public function setPlanDate($planDate) {
        $this->planDate = $planDate;
    }

    /**
     * Get planDate
     *
     * @return date 
     */
    public function getPlanDate() {
        return $this->planDate;
    }

}
