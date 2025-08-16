'use client';

import styles from './BlogPosts.module.scss';
import {robotoMono} from "@/common/fonts";
import {BlogPost, blogs} from "@/Components/BlogPosts/Blogs";
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome';
import {faQuoteLeft, faQuoteRight} from '@fortawesome/free-solid-svg-icons';
import {useMemo, useState, type FC, Fragment} from "react";
import {ContentWrapper} from "@/Components/ContentWrapper";
import {PrivacyPolicy} from "@/Components/PrivacyPolicy";

const BlogPost: FC<BlogPost> = ({url, source,title, paragraph, date}) => <div className={styles.blog}>
    <div className={styles.first}>
        <FontAwesomeIcon icon={faQuoteLeft} className={`${styles.quote}`} />
    </div>

    <div className={styles.second}>
        <div className={styles.top}>
            <span className={`${styles.title} ${robotoMono.className}`}><a href={url} target={'_blank'}>{title}</a></span>
        </div>
        <div className={styles.paragraphWrapper}>
            <p>{paragraph}</p>
        </div>
        <div className={styles.metadata}>
            <span className={styles.source}>{source}, </span>
            <span className={styles.date}>{date}</span>
        </div>
    </div>

    <div className={styles.third}>
        <FontAwesomeIcon icon={faQuoteRight} className={`${styles.quote} ${styles.right}`} />
    </div>
</div>

export const BlogPosts = () => {
    const perPage = 4;
    const [page, setPage] = useState(0);
    const blogsToShow = useMemo(() => {
        const start = page * perPage;
        return blogs.slice(start, start + perPage);
    }, [page]);

    return <div className={`${styles.blogsPostsWrapper} ${robotoMono.className}`}>
        <div className={styles.blogs} id="blogs">
            <ContentWrapper>
                <h2>Blog posts</h2>

                <div className={styles.blogsScroller}>
                    <div className={styles.blogsWrapper}>
                        {blogsToShow.map((blog, index) => <BlogPost key={index} {...blog} />)}
                    </div>

                    <ul className={styles.pager}>
                        {Array.from({length: Math.ceil(blogs.length / perPage)}, (_, index) => <Fragment key={index}>
                            <li className={index === page ? styles.active : ''} onClick={() => setPage(index)}>
                                {index + 1}
                            </li>
                        </Fragment>)}
                    </ul>
                </div>
                <PrivacyPolicy />
            </ContentWrapper>
        </div>
    </div>
};
