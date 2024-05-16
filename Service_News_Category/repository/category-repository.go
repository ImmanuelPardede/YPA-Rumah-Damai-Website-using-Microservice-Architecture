package repository

import (
	"github.com/iqbalsiagian17/Service_News_Category/model"
	"gorm.io/gorm"
)

type CategoryRepository interface {
	InsertCategory(category model.Category) model.Category
	UpdateCategory(category model.Category) model.Category
	All() []model.Category
	FindByID(CategoryID uint) model.Category
	DeleteCategory(category model.Category)
}

type categoryConnection struct {
	connection *gorm.DB
}

func NewCategoryRepository(db *gorm.DB) CategoryRepository {
	return &categoryConnection{
		connection: db,
	}
}

func (db *categoryConnection) InsertCategory(category model.Category) model.Category {
	db.connection.Save(&category)
	return category
}

func (db *categoryConnection) UpdateCategory(category model.Category) model.Category {
	db.connection.Save(&category)
	return category
}

func (db *categoryConnection) All() []model.Category {
	var categories []model.Category
	db.connection.Find(&categories)
	return categories
}

func (db *categoryConnection) FindByID(categoryID uint) model.Category {
	var category model.Category
	db.connection.Find(&category, categoryID)
	return category
}

func (db *categoryConnection) DeleteCategory(category model.Category) {
	db.connection.Delete(&category)
}
