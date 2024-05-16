package model

import (
	"gorm.io/gorm"
)

type GolonganDarah struct {
	gorm.Model
	GolonganDarah string `gorm:"type:varchar(255)" json:"golongan_darah"`
}
