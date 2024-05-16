package service

import (
	"log"

	"github.com/iqbalsiagian17/Service_News_Category/dto"
	"github.com/iqbalsiagian17/Service_News_Category/model"
	"github.com/iqbalsiagian17/Service_News_Category/repository"
	"github.com/mashingan/smapping"
)

// CategoryService is a contract about something that this service can do
type CategoryService interface {
	Insert(b dto.CategoryCreateDTO) model.Category
	Update(b dto.CategoryUpdateDTO) model.Category
	Delete(b model.Category)
	All() []model.Category
	FindByID(categoryID uint64) model.Category
}

type categoryService struct {
	categoryRepository repository.CategoryRepository
}

// NewCategoryService creates a new instance of CategoryService
func NewCategoryService(categoryRepository repository.CategoryRepository) CategoryService {
	return &categoryService{
		categoryRepository: categoryRepository,
	}
}

func (service *categoryService) All() []model.Category {
	return service.categoryRepository.All()
}

func (service *categoryService) FindByID(categoryID uint64) model.Category {

	id := uint(categoryID)
	return service.categoryRepository.FindByID(id)
}

func (service *categoryService) Insert(b dto.CategoryCreateDTO) model.Category {
	category := model.Category{}
	err := smapping.FillStruct(&category, smapping.MapFields(&b))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.categoryRepository.InsertCategory(category)
	return res
}

func (service *categoryService) Update(b dto.CategoryUpdateDTO) model.Category {
	category := model.Category{}
	err := smapping.FillStruct(&category, smapping.MapFields(&b))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.categoryRepository.UpdateCategory(category)
	return res
}

func (service *categoryService) Delete(b model.Category) {
	service.categoryRepository.DeleteCategory(b)
}
