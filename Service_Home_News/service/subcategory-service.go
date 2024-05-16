package service

import (
	"encoding/json" // Ini adalah impor yang diperlukan
	"fmt"
	"log"
	"net/http"

	"github.com/iqbalsiagian17/Service_News/dto"
	"github.com/iqbalsiagian17/Service_News/model"
	"github.com/iqbalsiagian17/Service_News/repository"
	"github.com/mashingan/smapping"
)

// SubcategoryService is a contract about something that this service can do
type NewsService interface {
	Insert(b dto.NewsCreateDTO) model.News
	Update(b dto.NewsUpdateDTO) model.News
	Delete(b model.News)
	All() []model.News
	FindByID(categoryID uint64) model.News
}

type newsService struct {
	newsRepository repository.NewsRepository
}

type CategoryService interface {
	GetCategoryID(id uint64) (uint64, error)
}

type categoryService struct{}

func NewCategoryService() CategoryService {
	return &categoryService{}
}

// NewnewsService creates a new instance of newsService
func NewNewsService(newsRepository repository.NewsRepository) NewsService {
	return &newsService{
		newsRepository: newsRepository,
	}
}

func (service *newsService) All() []model.News {
	return service.newsRepository.All()
}

func (service *newsService) FindByID(newsID uint64) model.News {

	id := uint(newsID)
	return service.newsRepository.FindByID(id)
}

func (service *newsService) Insert(b dto.NewsCreateDTO) model.News {
	news := model.News{}
	err := smapping.FillStruct(&news, smapping.MapFields(&b))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	// Set category_id from DTO to the news model
	news.CategoryID = b.CategoryID

	res := service.newsRepository.InsertNews(news)
	return res
}

func (service *newsService) Update(b dto.NewsUpdateDTO) model.News {
	news := model.News{}
	err := smapping.FillStruct(&news, smapping.MapFields(&b))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	// Set category_id from DTO to the news model
	news.CategoryID = b.CategoryID

	res := service.newsRepository.UpdateNews(news)
	return res
}

func (service *newsService) Delete(b model.News) {
	service.newsRepository.DeleteNews(b)
}

func (cs *categoryService) GetCategoryID(id uint64) (uint64, error) {
	// Replace the URL with the actual endpoint of your category service API
	url := fmt.Sprintf("http://localhost:9003/api/category/%d", id)

	resp, err := http.Get(url)
	if err != nil {
		return 0, err
	}
	defer resp.Body.Close()

	if resp.StatusCode != http.StatusOK {
		return 0, fmt.Errorf("failed to fetch Category ID: %s", resp.Status)
	}

	var category struct {
		ID uint64 `json:"id"`
	}
	if err := json.NewDecoder(resp.Body).Decode(&category); err != nil {
		return 0, err
	}

	return category.ID, nil
}
