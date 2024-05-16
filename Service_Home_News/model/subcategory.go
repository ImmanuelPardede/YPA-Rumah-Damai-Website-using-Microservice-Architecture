package model

import (
	"gorm.io/gorm"
)

type News struct {
	gorm.Model
	Judul      string `gorm:"type:varchar(255)" json:"judul"`
	Deskripsi  string `gorm:"type:varchar(255)" json:"deskripsi"`
	Image      string `gorm:"type:varchar(255)" json:"image"`
	CategoryID uint   `json:"category_id"`
}
