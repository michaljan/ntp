<?php
namespace NTPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @Vich\Uploadable
 */
class ParagonUpload
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    // ..... other fields

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="uploadName")
     * 
     * @var File
     */
    private $uploadFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $uploadName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $uploadFile
     *
     * @return ParagonUpload
     */
    public function setUploadFile(File $image = null)
    {
        $this->uploadFile = $uploadFile;

        if ($uploadFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getUploadFile()
    {
        return $this->uploadFile;
    }

    /**
     * @param string $uploadName
     *
     * @return ParagonUpload
     */
    public function setUploadName($uploadName)
    {
        $this->uploadName = $uploadName;

        return $this;
    }

    /**
     * @return string
     */
    public function getUploadName()
    {
        return $this->uploadName;
    }
}
