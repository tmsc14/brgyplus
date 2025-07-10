<?php

namespace App\Livewire\Documents;

use App\Enums\Documents\DocumentType;
use App\Livewire\Forms\CertificateOfIndigencyForm;
use App\Livewire\Forms\CertificateOfIndigencyWalkInForm;
use App\Services\DocumentsGeneratorService;
use App\Traits\DocumentRequestProfileTrait;
use Livewire\Attributes\Locked;
use Livewire\Component;

class CertificateOfIndigencyRequestProfile extends Component
{
    #[Locked]
    public $documentType = DocumentType::CERTIFICATE_OF_INDIGENCY;

    #[Locked]
    public $requiredFiles = ["Barangay Certification", "Certificate of No Property"];

    private DocumentsGeneratorService $documentsGeneratorService;

    public CertificateOfIndigencyForm $form;

    public CertificateOfIndigencyWalkInForm $walkInForm;

    use DocumentRequestProfileTrait;

    public function boot(DocumentsGeneratorService $documentsGeneratorService)
    {
        $this->documentsGeneratorService = $documentsGeneratorService;
    }

    public function mount()
    {
        $this->initializeDocumentRequestProfile();
    }
}
