package model

import (
	"gorm.io/gorm"
)

type Carousel struct {
	gorm.Model
	Title string `gorm:"type:varchar(255)" json:"title"`
	Subtitle string `gorm:"type:varchar(255)" json:"subtitle"`
	Image string `gorm:"type:varchar(255)" json:"image"`
}
