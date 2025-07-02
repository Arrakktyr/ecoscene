import sys
import json
import spacy
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.cluster import KMeans

nlp = spacy.load("en_core_web_sm")
nlp.max_length = 2000000  # Увеличиваем лимит длины текста

CHUNK_SIZE = 100000  # Максимальный размер чанка текста в символах

def chunk_text(text, size=CHUNK_SIZE):
    """Разбивает текст на чанки по size символов"""
    return [text[i:i+size] for i in range(0, len(text), size)]

def extract_keywords(text):
    """Извлекает ключевые слова из текста, обрабатывая его по чанкам"""
    chunks = chunk_text(text)
    keywords = []
    for chunk in chunks:
        doc = nlp(chunk)
        # Берём леммы существительных и глаголов, исключая стоп-слова
        keywords += [token.lemma_ for token in doc if token.pos_ in ("NOUN", "VERB") and not token.is_stop]
    # Возвращаем уникальные ключевые слова
    return list(set(keywords))

def categorize_texts(texts, n_clusters=10):
    processed = [extract_keywords(t) for t in texts]
    texts_joined = [" ".join(words) for words in processed]

    vectorizer = TfidfVectorizer()
    X = vectorizer.fit_transform(texts_joined)

    kmeans = KMeans(n_clusters=n_clusters, random_state=0).fit(X)
    return kmeans.labels_

if __name__ == "__main__":
    filename = sys.argv[1]
    with open(filename, 'r', encoding='utf-8') as f:
        data = json.load(f)

    # data — список словарей с ключами 'id' и 'content'
    texts = [item['content'] for item in data]

    labels = categorize_texts(texts)

    results = []
    for i, item in enumerate(data):
        results.append({
            'id': item['id'],
            'label': int(labels[i])
        })

    print(json.dumps(results, ensure_ascii=False))
