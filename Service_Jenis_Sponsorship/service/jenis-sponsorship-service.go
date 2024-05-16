package service

import (
	"log"

	"github.com/iqbalsiagian17/Service_Jenis_Sponsorship/dto"
	"github.com/iqbalsiagian17/Service_Jenis_Sponsorship/model"
	"github.com/iqbalsiagian17/Service_Jenis_Sponsorship/repository"
	"github.com/mashingan/smapping"
)

// JenisSponsorshipService is a contract about something that this service can do
type JenisSponsorshipService interface {
	Create(d dto.JenisSponsorshipCreateDTO) model.JenisSponsorship
	Update(d dto.JenisSponsorshipUpdateDTO) model.JenisSponsorship
	Delete(d model.JenisSponsorship)
	GetAll() []model.JenisSponsorship
	GetByID(jenisSponsorshipID uint64) model.JenisSponsorship
}

type jenisSponsorshipService struct {
	jenisSponsorshipRepository repository.JenisSponsorshipRepository
}

// NewJenisSponsorshipService creates a new instance of JenisSponsorshipService
func NewJenisSponsorshipService(jenisSponsorshipRepository repository.JenisSponsorshipRepository) JenisSponsorshipService {
	return &jenisSponsorshipService{
		jenisSponsorshipRepository: jenisSponsorshipRepository,
	}
}

func (service *jenisSponsorshipService) GetAll() []model.JenisSponsorship {
	return service.jenisSponsorshipRepository.All()
}

func (service *jenisSponsorshipService) GetByID(jenisSponsorshipID uint64) model.JenisSponsorship {
	id := uint(jenisSponsorshipID)
	return service.jenisSponsorshipRepository.FindByID(id)
}

func (service *jenisSponsorshipService) Create(d dto.JenisSponsorshipCreateDTO) model.JenisSponsorship {
	jenisSponsorship := model.JenisSponsorship{}
	err := smapping.FillStruct(&jenisSponsorship, smapping.MapFields(&d))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.jenisSponsorshipRepository.InsertJenisSponsorship(jenisSponsorship)
	return res
}

func (service *jenisSponsorshipService) Update(d dto.JenisSponsorshipUpdateDTO) model.JenisSponsorship {
	jenisSponsorship := model.JenisSponsorship{}
	err := smapping.FillStruct(&jenisSponsorship, smapping.MapFields(&d))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.jenisSponsorshipRepository.UpdateJenisSponsorship(jenisSponsorship)
	return res
}

func (service *jenisSponsorshipService) Delete(d model.JenisSponsorship) {
	service.jenisSponsorshipRepository.DeleteJenisSponsorship(d)
}
