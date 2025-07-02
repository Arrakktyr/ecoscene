import json
import sys
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity

try:
    with open(sys.argv[1], 'r', encoding='utf-8') as f:
        data = json.load(f)
        texts = [item['content'] for item in data]
        ids = [item['id'] for item in data]

    query = sys.argv[2]
    vectorizer = TfidfVectorizer()
    tfidf = vectorizer.fit_transform(texts + [query])
    similarity = cosine_similarity(tfidf[-1], tfidf[:-1])
    scores = similarity.flatten()
    results = [{"id": id_, "score": float(score)} for id_, score in zip(ids, scores)]

    print(json.dumps(results))
except Exception as e:
    import traceback
    print(json.dumps({"error": str(e), "trace": traceback.format_exc()}))
    sys.exit(1)
