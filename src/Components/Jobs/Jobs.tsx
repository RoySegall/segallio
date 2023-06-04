'use client';

import {useCallback, useMemo, useState} from "react";
import styles from './jobs.module.scss';
import {robotoMono} from "@/common/fonts";
import Image from 'next/image';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faChevronLeft, faChevronRight} from '@fortawesome/free-solid-svg-icons'
import {jobs as jobEntries} from './data'
import type {FC} from 'react';
import type {Job} from "@/Components/Jobs/data/Job";
import type {IconProp} from "@fortawesome/fontawesome-svg-core";

const Job: FC<{job: Job}> = ({job}) => <div className={styles.jobWrapper}>
    <div className={styles.header}>
        <NavigationButton icon={faChevronLeft} selectJob={() => {}} isActive={true} isMobile={true} />


        <div className={styles.logo}>
            <Image src={job.image} fill alt={job.name} />
        </div>
        <h3 className={`${robotoMono.className} ${styles.jobTitle}`}>{job.name}, {job.period.start} {job.period?.end && ` - ${job.period.end}`}: {job.position}</h3>
    </div>

    <div className={styles.jobInfo}>
        {job.paragraphs.map((paragraph, index) => <p key={index} className={robotoMono.className}>{paragraph}</p>)}
    </div>
</div>;

const NavigationButton: FC<{selectJob: any, isActive: boolean, icon: IconProp, isMobile?: boolean}> = (props) => {
    const {selectJob, isActive, icon, isMobile} = props;
    return <button onClick={selectJob} className={`${styles.arrow} ${isActive && styles.active} ${isMobile && styles.mobile}`}>
        <FontAwesomeIcon icon={icon} />
    </button>
}

export const Jobs = () => {
    const jobs = useMemo( () => [jobEntries.testim, jobEntries.dreamed, jobEntries.taliaz, jobEntries.realCommerce, jobEntries.gizra], []);
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
                <NavigationButton icon={faChevronLeft} selectJob={() => selectJob('next')} isActive={isActive.next} />
                <Job job={jobs[selectedJob]} />
                <NavigationButton icon={faChevronRight} selectJob={() => selectJob('prev')} isActive={isActive.prev} />
            </div>
        </div>
    </div>
}
