'use client';

import type {FC} from 'react';
import styles from './jobs.module.scss';
import {robotoMono} from "@/common/fonts";
import Image from 'next/image';
import type {Job} from "@/Components/Jobs/data/Job";
import {Dreamed} from "@/Components/Jobs/data/Dreamed";
import {Gizra} from "@/Components/Jobs/data/Gizra";
import {RealCommerce} from "@/Components/Jobs/data/RealCommerce";
import {Taliaz} from "@/Components/Jobs/data/Taliaz";
import left from '@/common/chevron-left-duotone.svg';
import right from '@/common/chevron-right-duotone.svg';
import {useCallback, useState} from "react";

const Job: FC<{job: Job}> = ({job}) => <div className={styles.jobWrapper}>
    <div className={styles.header}>

        <div className={styles.logo}>
            <Image src={job.image} fill alt={job.name} />
        </div>
        <h3 className={`${robotoMono.className} ${styles.jobTitle}`}>{job.name}, {job.period.start} {job.period?.end && ` - ${job.period.end}`}: {job.position}</h3>
    </div>

    <div className={styles.jobInfo}>
        {job.paragraphs.map((paragraph, index) => <p key={index} className={robotoMono.className}>{paragraph}</p>)}
    </div>
</div>;

export const Jobs = () => {
    const jobs = [Dreamed, Taliaz, RealCommerce, Gizra];
    const [selectedJob, setSelectedJob] = useState(0);
    const selectJob = useCallback((position: 'next' | 'prev') => {
        let selected = selectedJob;

        if (position === 'prev') {
            if (selected === jobs.length - 1) {
                return;
            }

            selected = selected + 1;

        } else {

            if (selected === 0) {
                return;
            }

            selected = selected - 1;
        }
        setSelectedJob(selected)
    }, [jobs.length, selectedJob]);

    return <div className={styles.jobsWrapper} id='jobs'>

        <div className={styles.jobs}>
            <h2 className={robotoMono.className}>Jobs</h2>
            <div className={styles.content}>
                <Image src={left} height={50} width={50} alt={'left'} className={styles.arrow} onClick={() => selectJob('next')} />
                <Job job={jobs[selectedJob]} />
                <Image src={right} height={50} width={50} alt={'left'} className={styles.arrow} onClick={() => selectJob('prev')} />
            </div>
        </div>
    </div>
}
