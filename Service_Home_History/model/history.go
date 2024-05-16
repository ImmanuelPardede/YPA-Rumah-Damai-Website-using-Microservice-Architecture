package model

import (
	"gorm.io/gorm"
)

type History struct {
	gorm.Model
	Sejarah  string `gorm:"type:varchar(255)" json:"sejarah"`
	Tujuan   string `gorm:"type:varchar(255)" json:"tujuan"`
	Dibangun string `gorm:"type:varchar(10)" json:"dibangun"`
	Image    string `gorm:"type:varchar(255)" json:"image"`
}
