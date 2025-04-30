<?php

namespace App\Enums;

enum JobEnums: string
{
    case EXPERIENCE_LEVEL = 'experience_level';
    case JOB_TYPE = 'job_type';
    case QUALIFICATION = 'qualification';
    case GENDER = 'gender';

    public static function getExperienceLevels(): array
    {
        return [
            '' => '--',
            'Intern' => 'Intern',
            'Junior' => 'Junior',
            'Mid' => 'Mid',
            'Senior' => 'Senior',
            'Principal' => 'Principal',
            'Manager' => 'Manager'
        ];
    }

    public static function getJobTypes(): array
    {
        return [
            '' => '--',
            'Full-time' => 'Full-time',
            'Part-time' => 'Part-time',
            'Contract' => 'Contract',
            'Freelance' => 'Freelance',
            'Internship' => 'Internship'
        ];
    }

    public static function getQualifications(): array
    {
        return [
            '' => '--',
            'High School' => 'High School',
            'Bachelor' => 'Bachelor',
            'Master' => 'Master',
            'PhD' => 'PhD'
        ];
    }

    public static function getGenders(): array
    {
        return [
            '' => '--',
            'Male' => 'Male',
            'Female' => 'Female',
            'Any' => 'Any'
        ];
    }
} 