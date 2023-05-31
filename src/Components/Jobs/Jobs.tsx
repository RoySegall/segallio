'use client';

import type {FC} from 'react';
import styles from './jobs.module.scss';
import {robotoMono} from "@/common/fonts";
import Image from 'next/image';
import type {Job} from "@/Components/Jobs/data/Job";
import {dreamed} from "@/Components/Jobs/data/Dreamed";
import {gizra} from "@/Components/Jobs/data/Gizra";
import {realCommerce} from "@/Components/Jobs/data/RealCommerce";
import {taliaz} from "@/Components/Jobs/data/Taliaz";
import left from './chevron-left-duotone.svg';
import right from './chevron-right-duotone.svg';
import {useCallback, useMemo, useState} from "react";

import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faChevronLeft, faChevronRight } from '@fortawesome/free-solid-svg-icons'
import {testim} from "@/Components/Jobs/data/Testim";

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
    const jobs = useMemo( () => [testim, dreamed, taliaz, realCommerce, gizra], []);
    const [selectedJob, setSelectedJob] = useState(0);
    const selectJob = useCallback((position: 'next' | 'prev') => {
        let selected = selectedJob;

        if (position === 'prev') {
            if (selected === jobs.length - 1) {
                return;
            }

            return setSelectedJob(selected + 1);
        }

        if (selected !== 0) {
            return setSelectedJob(selected - 1);
        }
    }, [jobs, selectedJob]);

    const isActive = useMemo(() => ({
        prev: selectedJob !== jobs.length - 1,
        next: selectedJob !== 0
    }), [selectedJob, jobs]);

    return <div className={styles.jobsWrapper} id='jobs'>
        <div className={styles.jobs}>
            <h2 className={robotoMono.className}>Jobs</h2>
            <div className={styles.content}>
                <button onClick={() => selectJob('next')} className={`${styles.arrow} ${isActive.next && styles.active}`}><FontAwesomeIcon icon={faChevronLeft} /></button>
                <Job job={jobs[selectedJob]} />
                <button onClick={() => selectJob('prev')} className={`${styles.arrow} ${isActive.prev && styles.active}`}><FontAwesomeIcon icon={faChevronRight} /></button>
            </div>
        </div>
    </div>
}
