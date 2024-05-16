package model

import (
	"gorm.io/gorm"
)

type Donasi struct {
	gorm.Model
	Donasi    string `gorm:"type:varchar(255)" json:"donasi"`
	Deskripsi string `gorm:"type:varchar(255)" json:"deskripsi"`
}
