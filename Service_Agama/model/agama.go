package model

import (
	"gorm.io/gorm"
)

type Agama struct {
	gorm.Model
	Agama string `gorm:"type:varchar(255)" json:"agama"`
}
