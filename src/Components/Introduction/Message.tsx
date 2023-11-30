import styles from "@/Components/Introduction/introduction.module.scss";
import {robotoMono} from "@/common/fonts";
import {Loading} from "@/Components/Loading";
import ReactChild, {FC, useEffect, useState} from "react";

export const Message: FC<{message: string|ReactChild.JSX.Element}> = ({message}) => {
    const [isLoading, setIsLoading] = useState(true);

    useEffect(() => {
        setTimeout(() => setIsLoading(false), 1000);
    }, []);

    return <p className={`${styles.message} ${robotoMono.className}`}>{isLoading ?  <Loading /> : message}</p>;
}
